const FormValidation = function() {

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
                    required: true,
                    minlength: 5,
                    maxlength: 50,
                },
                phone: {
                    required: true,
                    minlength: 18
                },
                email: {
                    required: true,
                    email: true
                },
                title: {
                    required: true,
                    maxlength: 100
                },
                content: {
                    required: true,
                    maxlength: 500
                },
            },
            messages: {
                name: {
                    required: "Bu alanın doldurulması zorunludur.",
                    minlength: "Lütfen en az 5 karakter uzunluğunda bir değer giriniz.",
                    maxlength: "Lütfen en fazla 50 karakter uzunluğunda bir değer giriniz.",
                },
                phone: {
                    required: "Bu alanın doldurulması zorunludur.",
                    minlength: "Lütfen telefon numarasını 10 hane olarak giriniz.",
                },
                email: {
                    required: "Bu alanın doldurulması zorunludur.",
                    email: "Lütfen geçerli bir e-posta adresi giriniz.",
                },
                title: {
                    required: "Bu alanın doldurulması zorunludur.",
                    maxlength: "Lütfen en fazla 100 karakter uzunluğunda bir değer giriniz.",
                },
                content: {
                    required: "Bu alanın doldurulması zorunludur.",
                    maxlength: "Lütfen en fazla 500 karakter uzunluğunda bir değer giriniz.",
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
    }

    return {
        init: function() {
            _componentMaskInput();
        }
    }
}();
