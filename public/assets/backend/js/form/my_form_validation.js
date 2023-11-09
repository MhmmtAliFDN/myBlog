const FormValidation = function() {

    // Select2 select
    const _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        const $select = $('.form-control-select2').select2({
            minimumResultsForSearch: Infinity
        });

        // Trigger value change when selection is made
        $select.on('change', function() {
            $(this).trigger('blur');
        });
    };

    // Validation config
    const _componentValidation = function() {
        if (!$().validate) {
            console.warn('Warning - validate.min.js is not loaded.');
            return;
        }

        // Initialize
        const contactAddValidator = $('#my_add_item_form').validate({
            ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
            errorClass: 'validation-invalid-label',
            successClass: 'validation-valid-label',
            validClass: 'validation-valid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            success: function(label) {
                label.addClass('validation-valid-label').text('Başarılı.'); // remove to hide Success message
            },

            // Different components require proper error label placement
            errorPlacement: function(error, element) {

                // Input with icons and Select2
                if (element.hasClass('select2-hidden-accessible')) {
                    error.appendTo(element.parent());
                }

                // Input group, form checks and custom controls
                else if (element.parents().hasClass('form-control-feedback') || element.parents().hasClass('form-check') || element.parents().hasClass('input-group')) {
                    error.appendTo(element.parent().parent());
                }

                // Other elements
                else {
                    error.insertAfter(element);
                }
            },
            rules: {
                my_modal_name: {
                    minlength: 5,
                    maxlength: 50,
                },
                my_modal_phone: {
                    minlength: 18
                },
                my_modal_email: {
                    email: true
                },
                my_modal_title: {
                    maxlength: 100
                },
                my_modal_content: {
                    maxlength: 500
                },

                password: {
                    minlength: 5
                },
                repeat_password: {
                    equalTo: '#password'
                },
                email: {
                    email: true
                },
                repeat_email: {
                    equalTo: '#email'
                },
                maximum_characters: {
                    maxlength: 10
                },
                minimum_number: {
                    min: 10
                },
                maximum_number: {
                    max: 10
                },
                number_range: {
                    range: [10, 20]
                },
                url: {
                    url: true
                },
                date: {
                    date: true
                },
                date_iso: {
                    dateISO: true
                },
                numbers: {
                    number: true
                },
                digits: {
                    digits: true
                },
                creditcard: {
                    creditcard: true
                },
                basic_checkbox: {
                    minlength: 2
                },
                styled_checkbox: {
                    minlength: 2
                },
                switch_group: {
                    minlength: 2
                }
            },
            messages: {
                my_modal_phone: {
                    minlength: "Lütfen telefon numarasını 10 hane olarak giriniz.",
                },

                custom: {
                    required: 'This is a custom error message'
                },
                basic_checkbox: {
                    minlength: 'Please select at least {0} checkboxes'
                },
                styled_checkbox: {
                    minlength: 'Please select at least {0} checkboxes'
                },
                switch_group: {
                    minlength: 'Please select at least {0} switches'
                },
                agree: 'Please accept our policy'
            }
        });

        const contactUpdateValidator = $('#my_update_item_form').validate({
            ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
            errorClass: 'validation-invalid-label',
            successClass: 'validation-valid-label',
            validClass: 'validation-valid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            success: function(label) {
                label.addClass('validation-valid-label').text('Başarılı.'); // remove to hide Success message
            },

            // Different components require proper error label placement
            errorPlacement: function(error, element) {

                // Input with icons and Select2
                if (element.hasClass('select2-hidden-accessible')) {
                    error.appendTo(element.parent());
                }

                // Input group, form checks and custom controls
                else if (element.parents().hasClass('form-control-feedback') || element.parents().hasClass('form-check') || element.parents().hasClass('input-group')) {
                    error.appendTo(element.parent().parent());
                }

                // Other elements
                else {
                    error.insertAfter(element);
                }
            },
            rules: {
                my_modal_name: {
                    minlength: 5,
                    maxlength: 50,
                },
                my_modal_phone: {
                    minlength: 18
                },
                my_modal_email: {
                    email: true
                },
                my_modal_title: {
                    maxlength: 100
                },
                my_modal_content: {
                    maxlength: 500
                },

                password: {
                    minlength: 5
                },
                repeat_password: {
                    equalTo: '#password'
                },
                email: {
                    email: true
                },
                repeat_email: {
                    equalTo: '#email'
                },
                maximum_characters: {
                    maxlength: 10
                },
                minimum_number: {
                    min: 10
                },
                maximum_number: {
                    max: 10
                },
                number_range: {
                    range: [10, 20]
                },
                url: {
                    url: true
                },
                date: {
                    date: true
                },
                date_iso: {
                    dateISO: true
                },
                numbers: {
                    number: true
                },
                digits: {
                    digits: true
                },
                creditcard: {
                    creditcard: true
                },
                basic_checkbox: {
                    minlength: 2
                },
                styled_checkbox: {
                    minlength: 2
                },
                switch_group: {
                    minlength: 2
                }
            },
            messages: {
                my_modal_phone: {
                    minlength: "Lütfen telefon numarasını 10 hane olarak giriniz.",
                },

                custom: {
                    required: 'This is a custom error message'
                },
                basic_checkbox: {
                    minlength: 'Please select at least {0} checkboxes'
                },
                styled_checkbox: {
                    minlength: 'Please select at least {0} checkboxes'
                },
                switch_group: {
                    minlength: 'Please select at least {0} switches'
                },
                agree: 'Please accept our policy'
            }
        });

        // Reset form
        $('#reset').on('click', function() {
            validator.resetForm();
        });
    };

    return {
        init: function() {
            _componentSelect2();
            _componentValidation();
        }
    }
}();

const ExtendedFormControls = function() {

    // Mask input
    const _componentMaskInput = function() {
        if (typeof IMask == 'undefined') {
            console.warn('Warning - imask.min.js is not loaded.');
            return;
        }

        const myAddItemForm = document.getElementById('my_add_item_form');
        const maskAddPhoneElement = myAddItemForm.querySelector('[name="my_modal_phone"]');

        if (maskAddPhoneElement) {
            const maskPhone = IMask(maskAddPhoneElement, {
                mask: '+{9\\0} (500)-000-0000'
            });
        }

        const myUpdateItemForm = document.getElementById('my_update_item_form');
        const maskUpdatePhoneElement = myUpdateItemForm.querySelector('[name="my_modal_phone"]');

        if (maskUpdatePhoneElement) {
            const maskPhone = IMask(maskUpdatePhoneElement, {
                mask: '+{9\\0} (500)-000-0000'
            });
        }
    }

    return {
        init: function() {
            _componentMaskInput();
        }
    }
}();

