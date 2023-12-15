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
                name: {
                    minlength: 5,
                    maxlength: 50,
                },
                phone: {
                    minlength: 18
                },
                email: {
                    email: true
                },
                title: {
                    maxlength: 100
                },
                content: {
                    maxlength: 500
                },
            },
            messages: {
                phone: {
                    minlength: "Lütfen telefon numarasını 10 hane olarak giriniz.",
                },
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
                name: {
                    minlength: 5,
                    maxlength: 50,
                },
                phone: {
                    minlength: 18
                },
                email: {
                    email: true
                },
                title: {
                    maxlength: 100
                },
                content: {
                    maxlength: 500
                },
            },
            messages: {
                phone: {
                    minlength: "Lütfen telefon numarasını 10 hane olarak giriniz.",
                },
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
        const maskAddPhoneElement = myAddItemForm.querySelector('[name="phone"]');

        if (maskAddPhoneElement) {
            const maskPhone = IMask(maskAddPhoneElement, {
                mask: '+{9\\0} (500)-000-0000'
            });
        }

        const myUpdateItemForm = document.getElementById('my_update_item_form');
        const maskUpdatePhoneElement = myUpdateItemForm.querySelector('[name="phone"]');

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
