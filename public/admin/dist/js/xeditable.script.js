(function ($) {
    "use strict";



    $.fn.editableform.buttons = '<button type="submit" class="btn btn-primary editable-submit waves-effect waves-light"><i class="icon-check"></i></button><button type="button" class="btn btn-danger editable-cancel waves-effect"><i class="icon-close"></i></button>';


    //editables 
    $('#username').editable({
        type: 'text',
        pk: 1,
        name: 'username',
        mode: "inline",
        title: 'Enter username'
    });
    $('#firstname').editable({
        mode: "inline",
        validate: function (value) {
            if ($.trim(value) == '')
                return 'This field is required';
        }
    });
    $('#sex').editable({
        prepend: "not selected",
        mode: "inline",
        source: [
            {value: 1, text: 'Male'},
            {value: 2, text: 'Female'}
        ],
        display: function (value, sourceData) {
            var colors = {"": "gray", 1: "green", 2: "blue"},
                    elem = $.grep(sourceData, function (o) {
                        return o.value == value;
                    });

            if (elem.length) {
                $(this).text(elem[0].text).css("color", colors[value]);
            } else {
                $(this).empty();
            }
        }
    });
    $('#group').editable({
        mode: "inline",
        showbuttons: false,
        source: [
            {value: 1, text: 'Guest'},
            {value: 2, text: 'Service'},
            {value: 3, text: 'Customer'},
            {value: 4, text: 'Operator'},
            {value: 5, text: 'Support'},
            {value: 6, text: 'Admin'}
        ]
    });
    $('#status').editable({
        mode: "inline",
        showbuttons: false,
        source: [
            {value: 1, text: 'Active'},
            {value: 2, text: 'Inactive'}
        ]
    });

    $('#dob').editable({
        mode: "inline"});
    $('#event').editable({
        placement: 'right',
        mode: "inline",
        combodate: {
            firstItem: 'name'
        }
    });
    $('#comments').editable({
        mode: "inline",
        showbuttons: 'bottom'
    });


    $('#fruits').editable({
        pk: 1,
        mode: "inline",
        limit: 3,
        source: [
            {value: 1, text: 'banana'},
            {value: 2, text: 'peach'},
            {value: 3, text: 'apple'},
            {value: 4, text: 'watermelon'},
            {value: 5, text: 'orange'}
        ]
    });




})(jQuery);
