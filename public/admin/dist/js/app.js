(function ($) {
    "use strict";
    var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');

//////////////////////// Window On Load //////////////////
    $(window).on("load", function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
        ;
    });


/////////////////////// Loader /////////////////////
    var angle = 0;
    setInterval(function () {

        $(".se-pre-con img")
                .css('-webkit-transform', 'rotate(' + angle + 'deg)')
                .css('-moz-transform', 'rotate(' + angle + 'deg)')
                .css('-ms-transform', 'rotate(' + angle + 'deg)');
        angle++;
        angle++;
        angle++;
    }, 10);


    $('.scrollerchat').slimScroll({
        height: '440px',
        color: '#fff'
    });
    $('.popupchat').slimScroll({
        height: '220px',
        color: '#fff'
    });
    $('.scrollertodo').slimScroll({
        height: '660px',
        color: '#fff'
    });

    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    $('.checkall').on('click', function () {
        $('.mail-app input:checkbox').not(this).prop('checked', this.checked);
    });
    /**************** Menu **********************/
    $('.sidebar-menu .dropdown>a').on('click', function () {
        $(this).parent().toggleClass('active');
        return false;
    });
//////////////////////// Country Drop Down /////////////////
    $('#options').flagStrap({
        countries: {
            "CA": "Canada",
            "CN": "China",
            "EG": "Egypt",
            "FR": "France",
            "GE": "Georgia",
            "HK": "Hong Kong",
            "IN": "India",
            "IT": "Italy",
            "JP": "Japan",
            "SZ": "Swaziland",
            "TH": "Thailand",
            "GB": "United Kingdom",
            "US": "United States"
        },
        buttonSize: "btn-sm",
        buttonType: "btn btn-outline-primary",
        labelMargin: "0px",
        scrollable: true,
        scrollableHeight: "350px"
    });

    /**************** Chat Pop Up **********************/
    $('.chatbutton').on('click', function () {
        $('.chatwindow').toggle();
        return false;

    });
    /*==============================================================
     Sidebar 
     ============================================================= */

    $('.sidebarCollapse').on('click', function () {
        $('body').toggleClass('compact-menu');
        $('.sidebar').toggleClass('active');
    });

    $('.mobilesearch').on('click', function () {
        $('.search-form').toggleClass('d-none');

    });

    /////////////////////////// Datepicker ////////////////////////
    if (typeof $.fn.datepicker !== "undefined") {
        $('.datepicker').datepicker();
    }

/////////////////////////// Wizard Form ////////////////////////

    $('.nexttab').click(function () {
        var nextId = $(this).parents('.tab-pane').next().attr("id");
        $('[href="#' + nextId + '"]').tab('show');
    });

    $('.prevtab').click(function () {
        var nextId = $(this).parents('.tab-pane').prev().attr("id");
        $('[href="#' + nextId + '"]').tab('show');
    });
    /********************************** Image Background *************************/
    $('.background-image-maker').each(function () {
        var imgURL = $(this).next('.holder-image').find('img').attr('src');
        $(this).css('background-image', 'url(' + imgURL + ')');
    });

    /********************************** Top Scroll *************************/
    $('.scrollup').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /****************************** Window Scroll ****************************/
    $(window).on("scroll", function () {
        /*==============================================================
         Back To Top
         =============================================================*/
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    /*==============================================================
     Form Validation 
     ============================================================= */
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    /*==============================================================
     Sidebar Settings 
     ============================================================= */

    var settinghtml = `<div id="settings" class="">
            <a href="#" id="settingbutton" class="setting"> 
                <h5 class="mb-0"><i class="icon-settings"></i></h5>
            </a>
            <div class="sidbarchat p-3">
                <h5 class="mb-0">TEMPLATE CUSTOMIZER</h5>
                <p>Customize your template</p>
                <hr/>
                <h6>TEMPLATE COLOR</h6>
                <ul class="list-inline float-left claerfix">
                    <li class="color-box m-2 list-inline-item float-left color1" data-color="#a355ff"></li>
                    <li class="color-box m-2 list-inline-item float-left color2" data-color="#0bb2d4"></li>                    
                    <li class="color-box m-2 list-inline-item float-left color3" data-color="#17b3a3"></li>
                    <li class="color-box m-2 list-inline-item float-left color4" data-color="#eb6709"></li>
                    <li class="color-box m-2 list-inline-item float-left color5" data-color="#76c335"></li>
                    <li class="color-box m-2 list-inline-item float-left color6" data-color="#3e8ef7"></li>
                    <li class="float-left list-inline-item"><input type="color" class="cursor-pointer color m-2"  value="#a355ff"></li>
                </ul>
                <hr class="float-left w-100"/>
               
                <h6>TEMPLATE STYLE</h6>                              
                <label class="chkbox">Light 
                    <input name="style" value="light" class="style" type="radio" >
                    <span class="checkmark"></span>
                </label> <br/>
                <label class="chkbox mt-2">Dark 
                    <input name="style" value="dark" class="style" type="radio" >
                    <span class="checkmark"></span>
                </label> <br/>
                <label class="chkbox mt-2">Semi Dark 
                    <input name="style" value="semi-dark" class="style" type="radio" >
                    <span class="checkmark"></span>
                </label> <br/>
    
                 <ul class="list-inline float-left  claerfix sidecolor" style="display:none;">                  
                    <li class="float-left list-inline-item"><input type="color" class="cursor-pointer sidebarcolor m-2"  value="#003366"></li>
                </ul>
                <br/><br/>
                <hr class="float-left w-100"/>
                <label class="chkbox boxed mb-2">Boxed Layout 
                    <input name="boxed" value="bodex" class="boxedlayout" type="checkbox" >
                    <span class="checkmark"></span>
                </label><br/>
                <label class="chkbox compact">Compact Sidebar 
                    <input name="compact" value="compact" class="sidebar" type="checkbox" >
                    <span class="checkmark"></span>
                </label>
               

            </div>
        </div>`;

    $("body").append(settinghtml);

    $('.setting').on('click', function () {
        $('#settings').toggleClass('active');
        return false;
    });


    var uri = window.location.href.toString();
    if (uri.indexOf("?") > 0) {
        delete_cookie('menulayout');
        delete_cookie('themecolor');
        delete_cookie('sidebarstyle');
        delete_cookie('boxed');
        delete_cookie('menuicon');
    }


////////////////////////////// TEMPLATE Color /////////////////////////

    $(".color-box").on('click', function () {
        $("input.color").val($(this).data('color'));
        $('body').css("--primarycolor", $("input.color").val());
        $('.dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark-alt').css("--primarycolor", $("input.color").val());
        createCookie('cookiesprimarycolor', $("input.color").val());
    });
    $("input.color").on('change', function () {
        $('body').css("--primarycolor", $("input.color").val());
        $('.dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark-alt').css("--primarycolor", $("input.color").val());
        createCookie('cookiesprimarycolor', $(this).val());
    });

    var cookiesprimarycolor = getCookie("cookiesprimarycolor");
    if (cookiesprimarycolor != null && cookiesprimarycolor != '') {
        $("input.color").val(cookiesprimarycolor);
        $('body').css("--primarycolor", cookiesprimarycolor);
        $('.dark').css("--primarycolor", cookiesprimarycolor);
        $('.semi-dark').css("--primarycolor", cookiesprimarycolor);
        $('.semi-dark-alt').css("--primarycolor", cookiesprimarycolor);
    }


///////////////////////////////// Sidebar Color //////////////////////////////
    $("input.sidebarcolor").on('change', function () {
        $('.sidebar').css("background", $("input.sidebarcolor").val());
        $('#header-fix .logo-bar').css("background", $("input.sidebarcolor").val());
        createCookie('cookiessidebarcolor', $("input.sidebarcolor").val());
    });
    var cookiessidebarcolor = getUrlParameter('cookiessidebarcolor');
    if (cookiessidebarcolor != null && cookiessidebarcolor != '')
    {
        createCookie('cookiessidebarcolor', cookiessidebarcolor);
    }
    var themecolor = getCookie("themecolor");
    if (themecolor == 'semi-dark')
    {
        var cookiessidebarcolor = getCookie("cookiessidebarcolor");
        if (cookiessidebarcolor != null && cookiessidebarcolor != '') {
            $("input.sidebarcolor").val(cookiessidebarcolor);
            $('.sidebar').css("background", cookiessidebarcolor);
            $('#header-fix .logo-bar').css("background", cookiessidebarcolor);

        }
    }

//////////////////////////// TEMPLATE Style //////////////////////////////////

    $('.style').on('click', function () {
        $('body').removeClass('light dark semi-dark dark-alt semi-dark-alt');
        $('body').addClass($(this).val());
        $('html').css("--primarycolor", $("input.color").val());
        $('.dark').css("--primarycolor", $("input.color").val());
        $('.semi-dark').css("--primarycolor", $("input.color").val());
        if ($(this).val() == "semi-dark")
        {
            $('.sidebar').css("background", $("input.sidebarcolor").val());
            $('#header-fix .logo-bar').css("background", $("input.sidebarcolor").val());
            $('.sidecolor').show();
        } else
        {
            $('.sidebar').css("background", '');
            $('#header-fix .logo-bar').css("background", '');

            $('.sidecolor').hide();
        }
        createCookie('themecolor', $(this).val());
    });

    var themecolor = getUrlParameter('themecolor');
    if (themecolor != null && themecolor != '')
    {
        createCookie('themecolor', themecolor);
    }

    var themecolor = getCookie("themecolor");
    if (themecolor != null && themecolor != '') {
        $('body').addClass(themecolor);
        $(".style[value='" + themecolor + "']").prop('checked', true);
        if (themecolor == 'semi-dark')
        {
            $('.sidecolor').show();
        } else
        {

            $('.sidecolor').hide();
        }
    }

///////////////////////////// Compact Menu /////////////////////////////

    $('input.sidebar').on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('compact-menu');
            $('.smail-icon').hide();

            createCookie('sidebarstyle', 'compact-menu');
        } else
        {
            $('body').removeClass('compact-menu');
            delete_cookie('sidebarstyle');
        }
    });

    var sidebarstyle = getUrlParameter('sidebarstyle');
    if (sidebarstyle != null && sidebarstyle != '')
    {
        createCookie('sidebarstyle', sidebarstyle);
    }

    var sidebarstyle = getCookie("sidebarstyle");
    if (sidebarstyle != null && sidebarstyle != '') {
        $('body').addClass(sidebarstyle);
        $('.smail-icon').hide();
        $(".sidebar").prop('checked', true);
    }

///////////////////////////// Boxed Layout /////////////////////////////

    $('.boxedlayout').on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('boxed');
            createCookie('boxed', 'boxed');
        } else
        {
            $('body').removeClass('boxed');
            delete_cookie('boxed');
        }
    });

    var boxedstyle = getUrlParameter('boxed');
    if (boxedstyle != null && boxedstyle != '')
    {
        createCookie('boxed', boxedstyle);
    }

    var boxedstyle = getCookie("boxed");
    if (boxedstyle != null && boxedstyle != '') {
        $('body').addClass(boxedstyle);
        $(".boxedlayout").prop('checked', true);
    }




/////////////////////////// Remove query string ///////////////////



    if (uri.indexOf("?") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    }

})(jQuery);
function createCookie(name, value) {
    var now = new Date();
    now.setTime(now.getTime() + 1 * 3600 * 1000);
    document.cookie = name + "=" + value + ";expires=" + now.toUTCString() + "; path=/liner";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function delete_cookie(name) {
    document.cookie = name + '=; Path=/liner; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
}


$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        $(".product_img #files").on("change", function(e) {
        var files = e.target.files,
            filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove\">Remove image</span>" +
                "</span>").insertAfter(".product_img #files");
            $(".remove").click(function(){
                $(this).parent(".pip").remove();
            });
        
            });
            fileReader.readAsDataURL(f);
        }
        console.log(files);
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
}); 

Array.prototype.search = function(elem) {
        for(var i = 0; i < this.length; i++) {
            if(this[i] == elem) return i;
        }
        
        return -1;
    };

    var Multiselect = function(selector) {
        if(!$(selector)) {
            console.error("ERROR: Element %s does not exist.", selector);
            return;
        }

        this.selector = selector;
        this.selections = [];

        (function(that) {
            that.events();
        })(this);
    };

    Multiselect.prototype = {
        open: function(that) {
            var target = $(that).parent().attr("data-target");

            // If we are not keeping track of this one's entries, then
            // start doing so.
            if(!this.selections) {
                this.selections = [ ];
            }

            $(this.selector + ".multiselect").toggleClass("active");
        },

        close: function() {
            $(this.selector + ".multiselect").removeClass("active");
        },

        events: function() {
            var that = this;

            $(document).on("click", that.selector + ".multiselect > .title", function(e) {
                if(e.target.className.indexOf("close-icon") < 0) {
                    that.open();
                }
            });

            $(document).on("click", that.selector + ".multiselect option", function(e) {
                var selection = $(this).attr("value");
                var target = $(this).parent().parent().attr("data-target");

                var io = that.selections.search(selection);

                if(io < 0) that.selections.push(selection);
                else that.selections.splice(io, 1);

                that.selectionStatus();
                that.setSelectionsString();
            });

            $(document).on("click", that.selector + ".multiselect > .title > .close-icon", function(e) {
                that.clearSelections();
            });

            $(document).click(function(e) {
                if(e.target.className.indexOf("title") < 0) {
                    if(e.target.className.indexOf("text") < 0) {
                        if(e.target.className.indexOf("-icon") < 0) {
                            if(e.target.className.indexOf("selected") < 0 ||
                            e.target.localName != "option") {
                                that.close();
                            }
                        }
                    }
                }
            });
        },

        selectionStatus: function() {
            var obj = $(this.selector + ".multiselect");

            if(this.selections.length) obj.addClass("selection");
            else obj.removeClass("selection");
        },

        clearSelections: function() {
            this.selections = [];
            this.selectionStatus();
            this.setSelectionsString();
        },

        getSelections: function() {
            return this.selections;
        },

        setSelectionsString: function() {
            var selects = this.getSelectionsString().split(", ");
            $(this.selector + ".multiselect > .title").attr("title", selects);

            var opts = $(this.selector + ".multiselect option");

            if(selects.length > 10) {
                var _selects = this.getSelectionsString().split(", ");
                _selects = _selects.splice(0, 10);
                $(this.selector + ".multiselect > .title > .text")
                    .text(_selects + " [...]");
            }
            else {
                $(this.selector + ".multiselect > .title > .text")
                    .text(selects);
            }

            for(var i = 0; i < opts.length; i++) {
                $(opts[i]).removeClass("selected");
            }

            for(var j = 0; j < selects.length; j++) {
                var select = selects[j];

                for(var i = 0; i < opts.length; i++) {
                    if($(opts[i]).attr("value") == select) {
                        $(opts[i]).addClass("selected");
                        break;
                    }
                }
            }
        },

        getSelectionsString: function() {
            if(this.selections.length > 0)
                return this.selections.join(", ");
            else return "Select";
        },

        setSelections: function(arr) {
            if(!arr[0]) {
                error("ERROR: This does not look like an array.");
                return;
            }

            this.selections = arr;
            this.selectionStatus();
            this.setSelectionsString();
        },
    }; 
    $(document).ready(function() {
        var multi = new Multiselect("#countries");
    });