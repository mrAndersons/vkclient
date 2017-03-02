// textarea: word-wrap: break-word; убрать все отступы, поставить высоту и ширину на 100% - отменить изменение высоты
// .input-block: зоставить отступы; изменять высоту блока
// посмотреть другие примеры и сделать полноценный плагин


(function ($) {
    // https://github.com/jerryluk/jquery.autogrow/blob/master/jquery.autogrow.js - пародия
    // https://github.com/jevin/Autogrow-Textarea/blob/master/jquery.autogrowtextarea.js - еще одна
    // http://jsfiddle.net/edelman/HrnHb/ (вот ничего) || https://plugins.jquery.com/autogrow/
    $.fn.autogrow = function (options) {
        // добавить опции
        this.filter('textarea').each(function () {
            var $this = $(this),
                minHeight = parseInt($this.css('min-height'), 10),//$this.height(), //parseInt($(this).parent().css('min-height'),10)
                lineHeight = $this.css('lineHeight'),
                classHiddenBlock = 'hidden_block-textarea';

            var shadow = {};

            if ($("." + classHiddenBlock).length == 0) {
                shadow = $('<div></div>').attr('class', classHiddenBlock).css({
                    position: 'absolute',
                    top: -10000,
                    left: -10000,
                    width: $(this).width(),// - parseInt($this.css('paddingLeft')) - parseInt($this.css('paddingRight')), // переделать пересчет
                    fontSize: $this.css('fontSize'),
                    fontFamily: $this.css('fontFamily'),
                    lineHeight: $this.css('lineHeight'),
                    resize: 'none'
                }).appendTo(document.body);
            } else {
                shadow = $("." + classHiddenBlock);
            }

            var update = function () {
                var times = function (string, number) {
                    for (var i = 0, r = ''; i < number; i++) r += string;
                    return r;
                };
                var val = this.value.replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/&/g, '&amp;')
                    .replace(/\n$/, '<br/>&nbsp;')
                    .replace(/\n/g, '<br/>')
                    .replace(
                        / {2,}/g,
                        function (space) {return times('&nbsp;', space.length - 1) + ' ';}
                    );
                shadow.html(val);

                $(this).css('height', Math.max(shadow.height() + 20, minHeight)); // 20 - отступ снизу(опционально)
            }

            // bind
            $(this).change(update).keyup(update).keydown(update);
            update.apply(this);
        });
        return this;
    }
})(jQuery);


(function ($) {
    var Chat = {
        /**
         * Инициализируем функционал
         */
        init: function () {
            this.cacheDOM();
            this.bindEvent();
            // this.render(); // тут получаем сообщения и выводим их
            // TODO: нижнее перененсти в render
            this.showTextArea();
        },
        /**
         * Определение элементов
         */
        cacheDOM: function () {
            this.$button = $('.send-btn');
            this.$textarea = $('.text-pole');
            this.$chatHistory = $('.chat-list');
            this.$chatHistoryList = this.$chatHistory.find('ul');

            this.$parentBlock = $('.window-area > .chat-area');
            this.$titleBlock = this.$parentBlock.find('.title');
            this.$inputBlock = this.$parentBlock.find('.input-area');
        },
        /**
         * Привязка событий
         */
        bindEvent: function () {
            // this.$button.on('click', this.addMessage.bind(this));
            this.$textarea.on('keyup', this.showTextArea.bind(this));
            this.$chatHistory.jScrollPane({
                animateScroll: true,
                mouseWheelSpeed: 30,
                autoReinitialise: true,
                autoReinitialiseDelay: 500
            });
        },
        /**
         * Вывод
         */
        render: function () {

        },
        /**
         * Высота блока с сообщениями
         */
        resizeHistoryList: function () {
            var chatHeight = this.$parentBlock.outerHeight(true) || 0;
            var titleHeight = this.$titleBlock.outerHeight(true) || 0;
            var inputHeight = this.$inputBlock.outerHeight(true) || 0;

            var listHeight = chatHeight - titleHeight - inputHeight - 2;
            this.$chatHistory.css('height', listHeight + 'px');

            this.scrollToBottom();
        },
        /**
         * Скролл вниз
         */
        scrollToBottom: function () {
            var cmp = this;
            setTimeout(function () {
                cmp.$chatHistory.data('jsp').scrollToBottom();
            }, 500);
        },
        /**
         * Выравнивание высоты textarea
         */
        showTextArea: function (event) {


            if (this.$textarea.val().toString().length == 0) {
                this.$textarea.css({'height': 'auto', 'paddingTop': '14px'});
            } else {
                this.$textarea.css('paddingTop', '0px');
                this.$textarea.autogrow();
                // var textareaScrollHeight = this.$textarea.get(0).scrollHeight || 0;
                // if (textareaScrollHeight <= 200) {
                //     this.$textarea.css('height', textareaScrollHeight + 'px');
                // } else {
                //     this.$textarea.css('height', '200px');
                // }
            }

            this.resizeHistoryList();
        }
    };

    Chat.init();
})(jQuery);


// function formatTextArea(textArea) {
//     if (textArea.length > 0) {
//         textArea.value = textArea.value.replace(/(^|\r\n|\n)([^*]|$)/g, "$1*$2");
//     }
// }

// window.onload = function() {
//     var textArea = document.getElementById("t");
//     textArea.onkeyup = function(evt) {
//         evt = evt || window.event;
//
//         if (evt.keyCode == 13) {
//             formatTextArea(this);
//         }
//     };
// };

// http://jscrollpane.kelvinluck.com/arrows.html
// https://codepen.io/vsync/pen/czgrf
// http://gromo.github.io/jquery.scrollbar/demo/basic.html - scroll
// http://pcvector.net/scripts/scrollup/412-nicescroll-alternativa-polos-prokrutki.html - scroll
// http://codepen.io/patrickkunka/pen/qeFds?editors=1000
// http://xiper.net/collect/js-plugins/forms/textarea-autoresize
