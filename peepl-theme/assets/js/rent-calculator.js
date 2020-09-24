jQuery(function ($) {

    var monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    var rent;
    var started;

    var loadData = function (cb) {
        return cb({
            rent: 500,
            started: new Date()
        });
    };

    var monthDiff = function (dateFrom, dateTo) {
        return dateTo.getMonth() - dateFrom.getMonth() +
            (12 * (dateTo.getFullYear() - dateFrom.getFullYear()));
    };

    var renderPot = function (rent, started) {
        var now = new Date();
        var months = monthDiff(started, now);

        var pot = rent * months * 0.08;

        $('.js-pot').text(pot);
        $('.js-monthly-payment').text(rent);
        $('.js-since-date').text(
            monthNames[started.getMonth()] + ' ' + started.getFullYear()
        );
        if ($('#rent').val() === '') {
            $('#rent').val(rent);
        }
        if ($('#months').val() === '') {
            $('#months').val(months);
        }
    };

    loadData(function (data) {
        if (rent && started) {
            renderPot(rent, started);
            $('.js-rent-calculator').css(
                'transition', 'none'
            ).addClass(
                'rent-calculator--active rent-calculator--complete'
            ).css(
                'transition', null
            );
        }
    });

    $('.js-rent-calculator').on('click', function () {
        if (!$(this).is('.rent-calculator--active')) {
            $(this).addClass('rent-calculator--active');
        }
    });

    $('.js-rent-calculator-form').on('submit', function (e) {
        e.preventDefault();

        var rent = parseInt($('#rent').val());
        var months = parseInt($('#months').val());
        var started = new Date();
        started.setMonth(started.getMonth() - months);

        renderPot(rent, started);

        $('.js-rent-calculator').addClass('rent-calculator--complete');
    });

    $('.js-edit-calculation').on('click', function () {
        $('.js-rent-calculator').removeClass('rent-calculator--complete');
    });

    $('.js-roost-alert').each(function () {
        var $el = $(this);
        var $steps = $(this).children('.roost-alert__step');

        var getCurrentStep = function () {
            return $el.data('step') || 0;
        }

        var setCurrentStep = function (i) {
            $el.data('step', i);
        }

        function updateUI() {
            var currentStep = getCurrentStep();
            if (currentStep > 0) {
                $el.addClass('roost-alert--active');
                $steps.each(function (i) {
                    $(this).toggleClass('roost-alert__step--active', i === currentStep);
                });
            } else {
                $el.removeClass('roost-alert--active');
            }
        }

        updateUI();

        $el.on('click', '.js-roost-alert-next-step', function () {
            setCurrentStep(getCurrentStep() + 1);
            updateUI();
        });

    });

});