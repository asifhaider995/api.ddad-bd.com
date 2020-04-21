(function($) {

  "use strict";

    /*
    |--------------------------------------------------------------------------
    | Template Name: 
    | Author: 
    | Developer: Tamjid Bin Murtoza;
    | Version: 1.0.0
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    | TABLE OF CONTENTS:
    |--------------------------------------------------------------------------
    |
    | 1. Main Menu
    | 2. Modal Video
    | 3. Background Image
    | 4. Owl Carousel
    | 5. Progress Bar
    | 6. Mailchimp
    | 6. Ajax Contact Form
    | 7. Isotop Initialize
    | 8. Footer Sticky
    |
    */

    /*--------------------------------------------------------------
      Scripts initialization
      --------------------------------------------------------------*/
      $.exists = function(selector) {
        return $(selector).length > 0;
      };

      $(window).on("load", function() {
        $(window).trigger("scroll");
        $(window).trigger("resize");
      });

      $(document).ready(function() {
        $(window).trigger("resize");
        headerInit();
        sideNavigationInit();
        progressBarInit();
        toggleInit();
        searchToggleInit();
        showPasswordInit();
        formEffectInit();
        dataTableInit();
        checkMarkInit();
        overlayScrollbarsInit();
        $('[data-toggle="tooltip"]').tooltip()
        $('.dataTables_length select').selectpicker();

        $('.st_selectpicker1').selectpicker();
        $('.st_selectpicker2').selectpicker({
          liveSearch: true
        });

      
  
      });

      $(window).on("resize", function() {});

      $(window).on("scroll", function() {});


    /*--------------------------------------------------------------
      #. Mobile Menu
      --------------------------------------------------------------*/
      function headerInit() {
        $('.st_nav').append('<span class="st_munu_toggle"><span></span></span>');
        $('.st_menu_item_has_children').append('<span class="tw-munu-dropdown-toggle"></span>');
        $('.st_munu_toggle').on('click', function() {
          $(this).toggleClass("tw-toggle-active").siblings('.st_nav_list').slideToggle();;
        });
        $('.tw-munu-dropdown-toggle').on('click', function() {
          $(this).toggleClass('active').siblings('ul').slideToggle();
        });
        // Header Gap
        let headerHeight = $('.st_sticky_header').height();
        $('.st_sticky_header').before(`<div style="height: ${headerHeight}px"></div>`);
      }


    /*--------------------------------------------------------------
      #. Side Navigation
      --------------------------------------------------------------*/

      function sideNavigationInit() {
        $(".st_side_nav_has_children>.st_side_nav_link").removeAttr("href").on("click", function() {
          $(this).toggleClass("active").siblings(".st_side_nav_submenu").slideToggle();
          $(this).parents('.st_side_nav_has_children').siblings().find('.st_side_nav_submenu').slideUp();
          $(this).parents('.st_side_nav_has_children').siblings().find('.st_side_nav_link').removeClass('active');
        });

        $('.st_side_toggle').on('click', function() {
          $('body').removeClass('st_side_nav_active').toggleClass('st_side_nav_minimize');
        });

        $(".st_side").hover(
          function() {
            $("body").addClass("st_side_nav_active");
          },
          function() {
            $("body").removeClass("st_side_nav_active");
          }
          );
      }

    /*--------------------------------------------------------------
      #. Overlay Scrollbars
      --------------------------------------------------------------*/
      function overlayScrollbarsInit() {
        $('.st_overlay_scroll').overlayScrollbars({
          className: 'os-theme-dark',
          sizeAutoCapable: true,
          scrollbars: {
            clickScrolling: true
          }
        });
      }

    /*--------------------------------------------------------------
      #. Progress Bar
      --------------------------------------------------------------*/
      function progressBarInit() {
        $('.tw-progressbar').each(function() {
          var progressPercentage = $(this).data('progress') + "%";
          $(this).find('.tw-progressbar-in').css('width', progressPercentage);
        });
      }

    /*--------------------------------------------------------------
      #. Progress Bar
      --------------------------------------------------------------*/
      function toggleInit() {
        $('.st_quick_nav_toggle').on('click', function() {
          $('.st_quick_nav_area').toggleClass('active');
          $('.st_close_overlay').addClass('active');
        })
        $('.st_close_overlay').on('click', function() {
          $('.st_quick_nav_area').removeClass('active');
          $('.st_close_overlay').removeClass('active');
        })
        $('.st_close_overlay_btn').on('click', function() {
          $('.st_quick_nav_area').removeClass('active');
          $('.st_close_overlay').removeClass('active');
        })

        // Custome Dropdown
        $('.st_dropdown_btn').each(function() {
          $(this).on('click', function() {
            $(this).toggleClass('active').siblings('.st_dropdown_btn_body').toggleClass('active');
            $(this).parent().toggleClass('st_dropdown_parent');
          })
          $(document).on("click", function() {
            $(".st_dropdown_btn_body").removeClass("active").siblings('.st_dropdown_btn').removeClass("active");
            $('.st_dropdown_btn').parent().removeClass('st_dropdown_parent');
          });
          $(".st_dropdown_btn, .st_dropdown_btn_body").on("click", function(e) {
            e.stopPropagation();
          });
        });
        $('.dropdown-toggle').on('click', function() {
          $(".st_dropdown_btn_body").removeClass("active");
        })

      }

    /*--------------------------------------------------------------
      #. Search Field
    --------------------------------------------------------------*/
    function checkForInput(element) {
      var $searchResult = $('.st_search_result');
      if ($(element).val().length > 0) {
        $searchResult.addClass('st_input_has_value');
        $('.st_dropdown_btn, .st_dropdown_btn_body').removeClass('active');
      } else {
        $searchResult.removeClass('st_input_has_value');
      }
    }

    // The lines below are executed on page load
    $('.st_search_field').each(function() {
      checkForInput(this);
    });

    // The lines below (inside) are executed on change & keyup
    $('.st_search_field').on('change keyup', function() {
      checkForInput(this);
    });

    // Search Toggle Function
    function searchToggleInit() {
      $('.st_search_close').on('click', function() {
        $('.st_search_result').removeClass('st_input_has_value');
        $('.st_search_area').removeClass('active');
        $('.st_search_form').find('.st_search_field').val("");
      });
      $('.st_search_toggle').on('click', function() {
        $('.st_search_area').addClass('active');
        $('.st_search_field').focus();
      })

      $(document).on("click", function() {
        $(".st_search_area").removeClass("active");
        $('.st_search_form').find('.st_search_field').val("");
      });
      $(".st_search_area, .st_search_toggle").on("click", function(e) {
        e.stopPropagation();
      });
    }

    /*--------------------------------------------------------------
      #. Show Password
    --------------------------------------------------------------*/
    function showPasswordInit() {
      $('.st_password_eye').each(function() {
        var $this = $(this);
        $this.addClass('st_show').click(function(){
          if( $this.hasClass('st_show') ) {
            $this.removeClass('st_show').siblings('.st_password').attr('type','text');
          } else {
           $this.addClass('st_show').siblings('.st_password').attr('type','password');
          }
        });
      });
    }



  /*--------------------------------------------------------------
    #. Form Effect
  --------------------------------------------------------------*/
  function formEffectInit() {
    $('.st_level_up .form-control').focusin(function() {
      $(this).parents('.st_level_up').addClass("active1");
    });
    $('.st_level_up .form-control').focusout(function() {
      $(this).parents('.st_level_up').removeClass("active1");
    });

    $('.st_level_up .form-control').blur(function() {
      if ($(this).val()) {
        $(this).parents('.st_level_up').addClass('active2');
      } else {
        $(this).parents('.st_level_up').removeClass('active2');
      }
    });

    $('.st_level_up .form-control').each(function() {
      if ($(this).val()) {
        $(this).parents('.st_level_up').addClass('active2');
      } else {
        $(this).parents('.st_level_up').removeClass('active2');
      }
    })







  }

  /*--------------------------------------------------------------
    #. Data Table
  --------------------------------------------------------------*/
  function dataTableInit() {
    if ($.exists("#st_dataTable")) {
      $('#st_dataTable').DataTable({
        "lengthMenu": [[6, 12, -1], ['6', '12', "All"]],
        "dom": '<"top"f>rt<"bottom"ilpB><"clear">',
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search...",
          "autoWidth": true,
          "info": "Showing _PAGE_ of _PAGES_",
          "lengthMenu": "_MENU_",
          paginate: {
            next: '<i class="material-icons">keyboard_arrow_right</i>',
            previous: '<i class="material-icons">keyboard_arrow_left</i>'  
          }
        }
      });
      $('#st_dataTable').wrap('<div class="st_dataTableWraqp"></div>')
    }
  }

  /*--------------------------------------------------------------
    #. Check Mark
  --------------------------------------------------------------*/
  function checkMarkInit() {
    $('.st_check_mark').on('click', function() {
      $(this).toggleClass('active').parents('tr').toggleClass('active');
    })
    $('.st_check_mark_all').on('click', function() {
      $(this).toggleClass('active').parents('tr').toggleClass('active');
    })
    $('.st_check_mark_all .st_first').on('click', function() {
      $('.st_check_mark').addClass('active').parents('tr').addClass('active');
    })
    $('.st_check_mark_all .st_last').on('click', function() {
      $('.st_check_mark').removeClass('active').parents('tr').removeClass('active');
    })
  }


})(jQuery); // End of use strict