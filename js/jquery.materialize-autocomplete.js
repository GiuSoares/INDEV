(function (root, factory) {

    if(typeof module === 'object' && module.exports) {
        module.exports = factory(require('jquery'));
    } else if(typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else {
        factory(root.jQuery);
    }

}(this, function ($) {

    var noop = function () {};

    var template = function (text) {
        var matcher = new RegExp('<%=([\\s\\S]+?)%>|<%([\\s\\S]+?)%>|$', 'g');

        var escapes = {
            "'": "'",
            '\\': '\\',
            '\r': 'r',
            '\n': 'n',
            '\u2028': 'u2028',
            '\u2029': 'u2029'
        };

        var escapeRegExp = /\\|'|\r|\n|\u2028|\u2029/g;

        var escapeChar = function(match) {
            return '\\' + escapes[match];
        };

        var index = 0;
        var source = "__p+='";

        text.replace(matcher, function(match, interpolate, evaluate, offset) {
            source += text.slice(index, offset).replace(escapeRegExp, escapeChar);
            index = offset + match.length;

            if (interpolate) {
                source += "'+\n((__t=(" + interpolate + "))==null?'':__t)+\n'";
            } else if (evaluate) {
                source += "';\n" + evaluate + "\n__p+='";
            }

            return match;
        });

        source += "';\n";
        source = 'with(obj||{}){\n' + source + '}\n';
        source = "var __t,__p='',__j=Array.prototype.join," +
            "print=function(){__p+=__j.call(arguments,'');};\n" +
            source + 'return __p;\n';

        var render;

        try {
            render = new Function('obj', source);
        } catch (e) {
            e.source = source;
            throw e;
        }

        var _template = function(data) {
            return render.call(this, data);
        };

        _template.source = 'function(obj){\n' + source + '}';

        return _template;
    };

    var Autocomplete = function (el, options) {
        this.options = $.extend(true, {}, Autocomplete.defaults, options);
        this.$el = $(el);
        this.$wrapper = this.$el.parent();
        this.compiled = {};
        this.$dropdown = null;
        this.$appender = null;
        this.$hidden = null;
        this.resultCache = {};
        this.value = '';
        this.initialize();
    };

    Autocomplete.defaults = {
        cacheable: true,
        limit: 10,
        multiple: {
            enable: false,
            maxSize: 4,
            onExist: function (item) {
                Materialize.toast('Tag: ' + item.text + '(' + item.id + ') is already added!', 2000);
            },
            onExceed: function (maxSize, item) {
                Materialize.toast('Can\'t add over ' + maxSize + ' tags!', 2000);
            },
            onAppend: function (item) {
                var self = this;
                self.$el.removeClass('active');
                self.$el.click();
            },
            onRemove: function (item) {
                var self = this;
                self.$el.removeClass('active');
                self.$el.click();
            }
        },
        hidden: {
            enable: true,
            el: '',
            inputName: '',
            required: false
        },
        appender: {
            el: '',
            tagName: 'ul',
            className: 'ac-appender',
            tagTemplate: '<div class="chip" data-id="<%= item.id %>" data-text="<%= item.text %>"><%= item.text %>(<%= item.id %>)<i class="material-icons close">close</i></div>'
        },
        dropdown: {
            el: '',
            tagName: 'ul',
            className: 'ac-dropdown',
            itemTemplate: '<li class="ac-item" data-id="<%= item.id %>" data-text="<%= item.text %>"><a href="javascript:void(0)"><%= item.text %></a></li>',
            noItem: ''
        },
        getData: function (value, callback) {
            callback(value, []);
        },
        onSelect: noop,
        ignoreCase: true,
        throttling: true,
        debounce: 200,
        enterOnSpace: false,
        allowNotSelectedItems: false,
    };

    Autocomplete.prototype = {
        constructor: Autocomplete,
        initialize: function () {
            var self = this;
            var timer;
            var fetching = false;

            function getItemsHtml (list) {
                var itemsHtml = '';

                if (!list.length) {
                    return self.options.dropdown.noItem;
                }

                list.forEach(function (item, idx) {

                    if (idx >= self.options.limit) {
                        return false;
                    }

                    itemsHtml += self.compiled.item({ 'item': item});
                });

                return itemsHtml;
            }

            function handleList (value, list) {
                var itemsHtml = getItemsHtml(list);
                var currentValue = self.$el.val();

                if (self.options.ignoreCase) {
                    currentValue = currentValue.toUpperCase();
                }

                if (self.options.cacheable && !self.resultCache.hasOwnProperty(value)) {
                    self.resultCache[value] = list;
                }

                if (value !== currentValue) {
                    return false;
                }

                if(itemsHtml) {
                    self.$dropdown.html(itemsHtml);
                    self.$dropdown.show();
                } else {
                    self.$dropdown.hide();
                }

            }

            self.value = self.options.multiple.enable ? [] : '';

            self.compiled.tag = template(self.options.appender.tagTemplate);
            self.compiled.item = template(self.options.dropdown.itemTemplate);

            self.render();

            self.$el.on('input', function (e) {
                var $t = $(this);
                var value = $t.val();

                if (!value) {
                    self.$dropdown.hide();
                    return false;
                }

                if (self.options.ignoreCase) {
                    value = value.toUpperCase();
                }

                if (self.resultCache.hasOwnProperty(value) && self.resultCache[value]) {
                    handleList(value, self.resultCache[value]);
                    return true;
                }

                if (self.options.throttling) {
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                        self.options.getData(value, handleList);
                    }, self.options.debounce);
                    return true;
                }

                self.options.getData(value, handleList);
            });

            self.$el.on('keydown', function (e) {
                var $t = $(this);
                var keyCode = e.keyCode;
                var $items, $hover;
                // BACKSPACE KEY
                if (keyCode == '8' && !$t.val()) {

                    if (!self.options.multiple.enable) {
                        return true;
                    }

                    if (!self.value.length) {
                        return true;
                    }

                    var lastItem = self.value[self.value.length - 1];
                    self.remove(lastItem);
                    return false;
                }
                // UP DOWN ARROW KEY
                if (keyCode == '38' || keyCode == '40') {

                    $items = self.$dropdown.find('[data-id]');

                    if (!$items.length) {
                        return false;
                    }

                    $hover = $items.filter('.ac-hover');

                    if (!$hover.length) {
                        $items.removeClass('ac-hover');
                        $items.eq(keyCode == '40' ? 0 : -1).addClass('ac-hover');
                    } else {
                        var index = $hover.index();
                        $items.removeClass('ac-hover');
                        $items.eq(keyCode == '40' ? (index + 1) % $items.length : index - 1).addClass('ac-hover');
                    }

                    return false;
                }
                // ENTER/SPACE KEY CODE
                if (keyCode == '13' || (self.options.enterOnSpace && keyCode == '32')) {
                    $items = self.$dropdown.find('[data-id]');

                    var id;
                    var text;

                    if (!$items.length && self.options.allowNotSelectedItems) {
                        id = e.target.value;
                        text = id;
                    } else if ($items.length) {

                        $hover = $items.filter('.ac-hover');

                        if ($hover.length) {
                            id = $hover.data('id');
                            text = $hover.data('text');
                        } else if (self.options.allowNotSelectedItems) {
                            id = e.target.value;
                            text = id;
                        }
                    }

                    if (!id) {
                        return false;
                    }

                    self.setValue({
                        id: id,
                        text: text
                    });

                    return false;
                }

            });

            self.$dropdown.on('click', '[data-id]', function (e) {
                var $t = $(this);
                var item = {
                    id: $t.data('id'),
                    text: $t.data('text')
                };

                self.setValue(item);
            });

            self.$appender.on('click', '[data-id] .close', function (e) {
                var $t = $(this);
                var $li = $t.closest('[data-id]');
                var item = {
                    id: $li.data('id'),
                    text: $li.data('text')
                };

                self.remove(item);
            });

        },
        render: function () {
            var self = this;

            if (self.options.dropdown.el) {
                self.$dropdown = $(self.options.dropdown.el);
            } else {
                self.$dropdown = $(document.createElement(self.options.dropdown.tagName));
                self.$dropdown.insertAfter(self.$el);
            }

            self.$dropdown.addClass(self.options.dropdown.className);

            if (self.options.appender.el) {
                self.$appender = $(self.options.appender.el);
            } else {
                self.$appender = $(document.createElement(self.options.appender.tagName));
                self.$appender.insertBefore(self.$el);
            }

            if (self.options.hidden.enable) {

                if (self.options.hidden.el) {
                    self.$hidden = $(self.options.hidden.el);
                } else {
                    self.$hidden = $('<input type="hidden" class="validate" />');
                    self.$wrapper.append(self.$hidden);
                }

                if (self.options.hidden.inputName) {
                    self.$hidden.attr('name', self.options.hidden.inputName);
                }

                if (self.options.hidden.required) {
                    self.$hidden.attr('required', 'required');
                }

            }

            self.$appender.addClass(self.options.appender.className);

        },
        setValue: function (item) {
            var self = this;

            if (self.options.multiple.enable) {
                self.append(item);
            } else {
                self.select(item);
            }

        },
        append: function (item) {
            var self = this;
            var $tag = self.compiled.tag({ 'item': item });

            if (self.value.some(function (selectedItem) {
                    return selectedItem.id === item.id;
                })) {

                if ('function' === typeof self.options.multiple.onExist) {
                    self.options.multiple.onExist.call(this, item);
                }

                return false;
            }

            if (self.value.length >= self.options.multiple.maxSize) {

                if ('function' === typeof self.options.multiple.onExceed) {
                    self.options.multiple.onExceed.call(this, self.options.multiple.maxSize, item);
                }

                return false;
            }

            self.value.push(item);
            self.$appender.append($tag);

            var valueStr = self.value.map(function (selectedItem) {
                return selectedItem.id;
            }).join(',');

            if (self.options.hidden.enable) {
                self.$hidden.val(valueStr);
            }

            self.$el.val('');
            self.$el.data('value', valueStr);
            self.$dropdown.html('').hide();

            if ('function' === typeof self.options.multiple.onAppend) {
                self.options.multiple.onAppend.call(self, item);
            }

        },
        remove: function (item) {
            var self = this;

            self.$appender.find('[data-id="' + item.id + '"]').remove();
            self.value = self.value.filter(function (selectedItem) {
                return selectedItem.id !== item.id;
            });

            var valueStr = self.value.map(function (selectedItem) {
                return selectedItem.id;
            }).join(',');

            if (self.options.hidden.enable) {
                self.$hidden.val(valueStr);
                self.$el.data('value', valueStr);
            }

            self.$dropdown.html('').hide();

            if ('function' === typeof self.options.multiple.onRemove) {
                self.options.multiple.onRemove.call(self, item);
            }

        },
        clear: function () {
            if (this.options.multiple.enable) {
                while (this.value.length > 0) {
                    this.remove(this.value[0]);
                }
            } else {
                this.select({id: '', text: ''});
            }

            this.$el.val('');
        },
        select: function (item) {
            var self = this;

            self.value = item.text;
            self.$el.val(item.text);
            self.$el.data('value', item.id);
            self.$dropdown.html('').hide();

            if (self.options.hidden.enable) {
                self.$hidden.val(item.id);
            }

            if ('function' === typeof self.options.onSelect) {
                self.options.onSelect.call(self, item);
            }
        }
    };

    $.fn.materialize_autocomplete = function (options) {
        var el = this;
        var $el = $(el).eq(0);
        var instance = $el.data('autocomplete');

        if (instance && arguments.length) {
            return instance;
        }

        var autocomplete = new Autocomplete(el, options);
        $el.data('autocomplete', autocomplete);
        $el.dropdown();
        return autocomplete;
    };

}));


    $(function () {
        var single = $('#singleInput').materialize_autocomplete({
            multiple: {
                enable: false
            },
            dropdown: {
                el: '#singleDropdown',
                itemTemplate: '<li class="ac-item" data-id="<%= item.id %>" data-text=\'<%= item.text %>\'><a href="javascript:void(0)"><%= item.highlight %></a></li>'
            },
            onSelect: function (item) {
                console.log(item.text + ' was selected');
            }
        });

        var multiple = $('#multipleInput').materialize_autocomplete({
            multiple: {
                enable: true
            },
            appender: {
                el: '.ac-users'
            },
            dropdown: {
                el: '#multipleDropdown'
                
            }
        });

        var resultCache = {
           
            'C': [
                {
                    id: 'C',
                    text: 'C',
                    highlight: '<strong>C</strong>z'
                },
                {
                    id: 'C#',
                    text: 'C#',
                    highlight: '<strong>C#</strong>z'
                },

                {
                    id: 'C++',
                    text: 'C++',
                    highlight: '<strong>C++</strong>z'
                },
            ],
            'P': [
                {
                    id: 'PHP',
                    text: 'PHP',
                    highlight: '<strong>PHP</strong>'
                },
                {
                    id: 'Python',
                    text: 'Python',
                    highlight: '<strong>Python</strong>'
                }
            ],
            'J': [
                {
                    id: 'Java',
                    text: 'Java',
                    highlight: '<strong>Java</strong>e'
                }
            ],
            'F': [
                {
                    id: 'Abe',
                    text: 'Abe',
                    highlight: '<strong>Abe</strong>'
                }
            ],
            'ARI': [
                {
                    id: 'Ari',
                    text: 'Ari',
                    highlight: '<strong>Ari</strong>'
                }
            ]
        };

        single.resultCache = resultCache;
        multiple.resultCache = resultCache;
    });