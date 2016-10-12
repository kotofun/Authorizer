<script type="application/javascript">
    (function ($) {
        $.fn.selectify = function () {

            var $selectified = this,
                    $select = this.find('select'),
                    $dropdownContainer = this.find('.dropdown__container'),
                    $dropdownSelected = this.find('.dropdown__selected'),
                    $dropdownItems = this.find('.dropdown__item');

            $select.hide();
            $dropdownContainer.show();
            $dropdownSelected.on('click', function (event) {
                event.preventDefault();
                $dropdownContainer.toggleClass('dropdown__container_open');
            })
            $dropdownItems.on('click', function (event) {
                event.preventDefault();
                var $clicked = $(event.target);
                var $active = $selectified.find('.dropdown__item_active');

                if (!$active.is($clicked)) {
                    $active.removeClass('dropdown__item_active');
                    $clicked.addClass('dropdown__item_active');
                    $dropdownSelected.attr('data-value', $clicked.attr('data-value'));
                    $dropdownSelected.text($clicked.text());
                    $select.val($clicked.attr('data-value'));
                }

                $dropdownContainer.removeClass('dropdown__container_open');
            });

            $(document).on('mouseup', function (event) {
                if (!$dropdownContainer.is(event.target) && $dropdownContainer.has(event.target).length === 0) {
                    $dropdownContainer.removeClass('dropdown__container_open');
                }
            });
        };

        $.fn.listable = function (options) {

            var settings = $.fn.extend({
                openDuration: 10,
                scrollUpDuration: 100,
                scrollUpPosition: 40
            }, options);

            return this.change(function () {
                var $subList = $('.with-sub-list').siblings('.sub-list');
                var $this = $(this);
                if ($this.hasClass('with-sub-list') && $this.is(':checked')) {
                    $subList.addClass('sub-list-opened');
                    $subList.show(settings.openDuration, function () {
                        $(this).find('.help-list__item').first().show(settings.openDuration, function showNext() {
                            $(this).next('.help-list__item').show(settings.openDuration, showNext);
                        })
                    });
                } else {
                    if ($('.sub-list-opened').length) {
                        var $scrollTo = $this.parents('fieldset');
                        $('html body').animate({
                            scrollTop: $scrollTo.position().top - settings.scrollUpPosition
                        }, settings.scrollUpDuration);
                        $subList.hide();
                        $subList.find('.help-list__item').hide();
                        $('.sub-list-opened').removeClass('sub-list-opened');
                    }
                }
            })

        };
    })(jQuery);

    $(document).ready(function () {
        $('.no-js').removeClass('no-js');
        $('.combobox').selectify();
        $('input[name="help_type"]').listable();
    });
</script>
