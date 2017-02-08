$(function()
{
    $('.chat-area > .chat-list').jScrollPane({
        mouseWheelSpeed: 30
    });

    $('.input-wrapper > .input-block').jScrollPane({
        mouseWheelSpeed: 30
    });

    // scroll
    $('.chat-list').scrollTop($('.chat-list')[0].scrollHeight);

    // height textarea
    var textarea = document.querySelector('textarea');
    textarea.addEventListener('keydown', autosize);
    function autosize(){
        var el = this;
        setTimeout(function(){
            // el.style.cssText = 'height:auto; padding:0';
            // for box-sizing other than "content-box" use:
            el.style.cssText = '-moz-box-sizing:content-box';

            if (el.scrollHeight <= 200) {
                el.style.cssText = 'height:' + el.scrollHeight + 'px';
            }
        },0);
    }
});