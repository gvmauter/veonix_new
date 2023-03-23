(function($){
    $(function () {
        const customSelect = new CustomSelect();

        updateCountersList();

        $('.yam-repeater-field__add-btn').on('click', function () {
            let $repeater = $(this).closest('.yam-repeater-field'),
                $row = $repeater.find('.yam-repeater-field__row_tpl').eq(0).clone().removeClass('yam-repeater-field__row_tpl');

            $('.yam-repeater-field__rows', $repeater).append($row);

            reindexRows($repeater);
        });

        $('.text-field__reset').on('click', function () {
            let $resetBtn = $(this),
                $textField = $resetBtn.closest('.text-field'),
                $input = $('.text-field__input', $textField);

            $input.val('');
        });

        $('[data-toggle]').on('click', function () {
            let $btn = $(this),
                selector = $btn.data('toggle'),
                $target = $(selector);

            if ($target.length) {
                $target.toggleClass('active');
            }
        });

        $('.yam__site').on('click', function () {
            let $siteBtn = $(this),
                siteId = $siteBtn.data('site'),
                $siteSettings = $('.yam__settings_site_' + siteId);

            if ($siteSettings.length) {
                $('.yam__settings, .yam__site').removeClass('active');
                $siteSettings.addClass('active');
                $siteBtn.addClass('active');

                updateCountersList();
            }
        });

        $(document).on('click', '.yam-repeater-field__remove-btn', function () {
            let $btn = $(this),
                $repeater = $btn.closest('.yam-repeater-field'),
                $row = $btn.closest('.yam-repeater-field__row');

            $row.remove();
            reindexRows($repeater);
        });

        $(document).on('change keyup input click', '[data-input-type="number"]', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $(document).on('click', '.yam-spoiler__btn', function () {
            var $btn = $(this),
                $spoiler = $btn.closest('.yam-spoiler'),
                $content = $spoiler.find('.yam-spoiler__content');

            $btn.toggleClass('active');

            if ($btn.hasClass('active')) {
                $content.addClass('active')
            } else {
                $content.removeClass('active')
            }
        });

        $(document).on('click', '.yam-repeater-field_counters .yam-repeater-field__add-btn', function () {
            updateCountersList();
        });

        $(document).on('click', '.yam-repeater-field_counters .yam-repeater-field__remove-btn', function () {
            updateCountersList();
        });

        $(document).on('change', '.yam-repeater-field_counters .yam-repeater-field__input', function () {
            updateCountersList();
        });

        //functions

        function reindexRows($repeater) {
            //reindex row inputs
            $repeater.find('.yam-repeater-field__row').not('.yam-repeater-field__row_tpl').each(function (index) {
                const $row = $(this);

                $row.find('.yam-repeater-field__input').each(function () {
                    let $input = $(this),
                        name = $input.attr('data-name');

                    $input.attr('name', name.replace(/\$/, index));
                });
            });
        }

        function updateCountersList() {
            let countersList = [];

            $('.yam__settings.active .yam-repeater-field_counters .yam-repeater-field__row').each(function () {
                const $this = $(this),
                    $number = $('.yam-repeater-field__input[name$="[number]"]', $this);

                let number;

                if ($number.length) {
                    number = $number.val();
                }

                if (number) {
                    countersList.push(number);
                }
            });

            updateMasksCounters(countersList);
        }


        function updateMasksCounters(countersList) {
            $('.yam__settings.active .yam-repeater-field_masks .custom-select__orig').each(function(){
                const $select = $(this);
                const $selectedOption = $('option:selected', $select);
                let selectedNumber = '';

                if ($selectedOption.length) {
                    selectedNumber = $selectedOption.val();
                }

                let optionsHtml = '<option value="">-</option>';
                countersList.forEach(function(number){
                    optionsHtml += '<option value="'+number+'" '+(selectedNumber === number ? 'selected' : '')+'>'+number+'</option>';
                });

                $select.html(optionsHtml);

                customSelect.decorate($select);
            });
        }
    });


    const CustomSelect = function () {
        $(document).on('click', function (e) {
            let $target = $(e.target),
                $select = $target.closest('.custom-select');

            if ($select.length) {
                $('.custom-select').not($select).removeClass('active');
            } else {
                $('.custom-select').removeClass('active');
            }
        });

        $(document).on('click', '.custom-select__active', function () {
            let $active = $(this),
                $value = $active.find('.custom-select__active-value'),
                $select = $value.closest('.custom-select'),
                $optionsContainer = $select.find('.custom-select__options'),
                isActive = $select.hasClass('active');

            $select.removeClass('active');

            if (!isActive) {
                $select.addClass('active');
            }
        });

        $(document).on('click', '.custom-select__option',  function () {
            let $option = $(this),
                $select = $option.closest('.custom-select'),
                $orig = $select.find('.custom-select__orig'),
                $value = $select.find('.custom-select__active-value'),
                $optionsContainer = $select.find('.custom-select__options'),
                value = $option.data('value'),
                label = $option.text();

            $orig.find('[value="' + value + '"]').prop('selected', true);
            $value.text(label);
            $select.removeClass('active');
        });

        this.decorate = function ($select) {
            $select = $($select);

            if (!$select.length) {
                return;
            }

            const options = this.getSelectOptionsData($select);
            const optionsHtml = this.generateOptions(options);
            let $customSelect = $select.closest('.custom-select');

            if (!$customSelect.length) {
                const customSelectHtml = this.generateHtml(),
                    modifier = $select.data('modifier');

                $customSelect = $(customSelectHtml);
                $select.after($customSelect);
                $customSelect.prepend($select);
                if (modifier) {
                    $customSelect.addClass('custom-select_'+modifier);
                }
            }

            $customSelect.find('.custom-select__options').html(optionsHtml);

            const activeOption = options.find(function(optionData){
                return optionData.active;
            });
            if (activeOption) {
                $customSelect.find('.custom-select__active-value').text(activeOption.label);
            }
        }

        this.generateHtml = function () {
            return '<div class="custom-select">' +
                '<div class="custom-select__active"><div class="custom-select__active-value"></div></div>' +
                '<div class="custom-select__options"></div>' +
                '</div>';
        }

        this.generateOptions = function(options){
            let optionsHtml = '';

            options.forEach(function (option) {
                let activeClass = '';

                if (option.active) {
                    activeClass = 'active';
                }

                optionsHtml += '<div class="custom-select__option ' + activeClass + '" data-value="' + option.key + '">' + option.label + '</div>';
            });

            return optionsHtml;
        }

        this.getSelectOptionsData = function ($select) {
            const options = [];

            $('option', $select).each(function () {
                const $option = $(this),
                    key = $option.val(),
                    label = $option.text(),
                    active = $option.is(':selected');

                options.push({
                    key: key,
                    label: label,
                    active: active
                })
            });

            return options;
        }
    }

})(jQuery);
