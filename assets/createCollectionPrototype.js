import $ from 'jquery';
$('button.create-collection-prototype').click(collectionPrototypeClick)

function collectionPrototypeClick() {
    const list = $($(this).attr('data-list-selector'));
    let counter = list.data('widget-counter') || list.children().length;

    let newWidget = list.attr('data-prototype');
    newWidget = newWidget.replace(/__name__/g, counter);
    const widget = $(newWidget)
    list.data('widget-counter', counter +1);

    widget.appendTo(list);

}