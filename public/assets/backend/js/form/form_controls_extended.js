/* ------------------------------------------------------------------------------
 *
 *  # Extended form controls
 *
 *  Demo JS code for form_controls_extended.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

const ExtendedFormControls = function() {


    //
    // Setup module components
    //

    // Mask input
    const _componentMaskInput = function() {
        if (typeof IMask == 'undefined') {
            console.warn('Warning - imask.min.js is not loaded.');
            return;
        }

        // Phone #
        const maskPhoneElement = document.querySelector('[name="my_modal_phone"]');
        if(maskPhoneElement) {
            const maskPhone = IMask(maskPhoneElement, {
                mask: '+{9\\0} (000)-000-0000'
            });
        }
    };

    // Autosize
    const _componentAutosize = function() {
        if (typeof autosize == 'undefined') {
            console.warn('Warning - autosize.min.js is not loaded.');
            return;
        }

        // Basic example
        autosize(document.querySelectorAll('.elastic'));

        // Manual trigger
        const manualElement = document.querySelector('.elastic-manual');
        const manualElementTrigger = document.querySelector('.elastic-manual-trigger');
        manualElementTrigger.addEventListener('click', function() {
            const manual = autosize(manualElement);
            manualElement.value = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed ultricies nibh, sed faucibus eros. Vivamus tristique fringilla ante, vitae pellentesque quam porta vel. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc vehicula gravida nisl non imperdiet. Mauris felis odio, vehicula et laoreet non, tempor non enim. Cras convallis sapien hendrerit nibh sagittis sollicitudin. Fusce nec ultricies justo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce ac urna in dui consequat cursus vel sit amet mauris. Proin nec bibendum arcu. Aenean sit amet nisi mi. Sed non leo nisl. Mauris leo odio, ultricies interdum ornare ac, posuere eu risus. Suspendisse adipiscing sapien sit amet gravida sollicitudin. Maecenas laoreet velit in dui adipiscing, vel fermentum tellus ullamcorper. Nullam et mi rhoncus, tempus nulla sit amet, varius ipsum.';
            autosize.update(manual);
        });

        // Events
        const eventsElement = document.querySelector('.elastic-events');
        const eventsElementTrigger = document.querySelector('.elastic-events-trigger');
        eventsElementTrigger.addEventListener('click', function() {
            const events = autosize(eventsElement);
            eventsElement.value = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed ultricies nibh, sed faucibus eros. Vivamus tristique fringilla ante, vitae pellentesque quam porta vel. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc vehicula gravida nisl non imperdiet. Mauris felis odio, vehicula et laoreet non, tempor non enim. Cras convallis sapien hendrerit nibh sagittis sollicitudin. Fusce nec ultricies justo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce ac urna in dui consequat cursus vel sit amet mauris. Proin nec bibendum arcu. Aenean sit amet nisi mi. Sed non leo nisl. Mauris leo odio, ultricies interdum ornare ac, posuere eu risus. Suspendisse adipiscing sapien sit amet gravida sollicitudin. Maecenas laoreet velit in dui adipiscing, vel fermentum tellus ullamcorper. Nullam et mi rhoncus, tempus nulla sit amet, varius ipsum.';
            autosize.update(events);
        });
        eventsElement.addEventListener('autosize:resized', function(){
          console.log('textarea height updated');
        });

        // Destroy method
        const destroyAutosize = autosize(document.querySelector('.elastic-destroy'));
        document.querySelector('.elastic-destroy-trigger').addEventListener('click', function() {
            autosize.destroy(destroyAutosize);
        });
    };

    // Maxlength
    const _componentMaxlength = function() {
        if (!$().maxlength) {
            console.warn('Warning - maxlength.min.js is not loaded.');
            return;
        }

        // Basic example
        $('.maxlength').maxlength({
            placement: document.dir == "rtl" ? 'bottom-left-inside' : 'bottom-right-inside'
        });

        // Threshold
        $('.maxlength-threshold').maxlength({
            threshold: 15,
            placement: document.dir == "rtl" ? 'bottom-left-inside' : 'bottom-right-inside'
        });

        // Custom badge color
        $('.maxlength-custom').maxlength({
            threshold: 10,
            warningClass: 'badge bg-primary form-text',
            limitReachedClass: 'badge bg-danger form-text',
            placement: document.dir == "rtl" ? 'bottom-left-inside' : 'bottom-right-inside'
        });

        // Options
        $('.maxlength-options').maxlength({
            alwaysShow: true,
            threshold: 10,
            warningClass: 'text-success form-text',
            limitReachedClass: 'text-danger form-text',
            separator: ' of ',
            preText: 'You have ',
            postText: ' chars remaining.',
            validate: true,
            placement: document.dir == "rtl" ? 'bottom-left-inside' : 'bottom-right-inside'
        });

        // Always show badge
        $('.maxlength-textarea').maxlength({
            alwaysShow: true,
            placement: document.dir == "rtl" ? 'bottom-left-inside' : 'bottom-right-inside'
        });

        // Badge position
        $('.maxlength-badge-position').maxlength({
            alwaysShow: true,
            placement: 'centered-right',
            warningClass: 'text-success left-auto right-0 top-50 translate-middle-y pe-2 mr-1',
            limitReachedClass: 'text-danger left-auto right-0 top-50 translate-middle-y pe-2 mr-1',
            placement: document.dir == "rtl" ? 'centered-left' : 'centered-right'
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentMaskInput();
            _componentAutosize();
            _componentPassy();
            _componentMaxlength();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    ExtendedFormControls.init();
});
