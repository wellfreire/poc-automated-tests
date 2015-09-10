$(function ()
{
    $("button[type='button']").on(
    {
        'click': function ()
        {
            var expressionInput = $("input[name='expression']");
            expressionInput.val(expressionInput.val() + $(this).val());
        }
    });
});