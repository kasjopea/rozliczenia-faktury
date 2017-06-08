(function($){
	$(document).ready(function(){

        var styczen    = $("aside ul li:first-child"),
            luty       = $("aside ul li:nth-child(2)"),
            marzec     = $("aside ul li:nth-child(3)"),
            kwiecien   = $("aside ul li:nth-child(4)"),
            maj        = $("aside ul li:nth-child(5)"),
            czerwiec   = $("aside ul li:nth-child(6)"),
            lipiec     = $("aside ul li:nth-child(7)"),
            sierpien   = $("aside ul li:nth-child(8)"),
            wrzesien   = $("aside ul li:nth-child(9)"),
            pazdziernik= $("aside ul li:nth-child(10)"),
            listopad   = $("aside ul li:nth-child(11)"),
            grudzien   = $("aside ul li:last-child"),
            miesiac    = $("aside ul li");

        var Sty = $("main div:first-child").hide();
            Lut = $("main div:nth-child(2)").hide();
            Mar = $("main div:nth-child(3)").hide();
            Kwi = $("main div:nth-child(4)").hide();
            Maj = $("main div:nth-child(5)").hide();
            Cze = $("main div:nth-child(6)").hide();
            Lip = $("main div:nth-child(7)").hide();
            Sie = $("main div:nth-child(8)").hide();
            Wrz = $("main div:nth-child(9)").hide();
            Paz = $("main div:nth-child(10)").hide();
            Lis = $("main div:nth-child(11)").hide();
            Gru = $("main div:last-child").hide();
            Mie = $("main div");      

    styczen.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Sty.show();
        styczen.addClass("active");
    });
    luty.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Lut.show();
        luty.addClass("active");
    });
    marzec.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Mar.show();
        marzec.addClass("active");
    });
     kwiecien.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Kwi.show();
        kwiecien.addClass("active");
    });
     maj.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Maj.show();
        maj.addClass("active");
    });
     czerwiec.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Cze.show();
        czerwiec.addClass("active");
    });
     lipiec.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Lip.show();
        lipiec.addClass("active");
    });
     sierpien.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Sie.show();
        sierpien.addClass("active");
    });
     wrzesien.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Wrz.show();
        wrzesien.addClass("active");
    });
     pazdziernik.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Paz.show();
        pazdziernik.addClass("active");
    });
     listopad.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Lis.show();
        listopad.addClass("active");
    });
     grudzien.on("click", function(){
        Mie.hide();
        miesiac.removeClass("active");
        Gru.show();
        grudzien.addClass("active");
    });
    
	

    var  d     = new Date(),
         day   = d.getDate(),
         month = d.getMonth() + 1;

   if((month == 1) && (day>15)){
        styczen.addClass("active");
        Sty.show();
    }

    if(month == 2) {
        if (day>15) {
        luty.addClass("active");
        Luty.show();
        } else {
        styczen.addClass("active");
        Sty.show();
    }
    }

    
    if(month == 3) {
        if (day>15) {
        marzec.addClass("active");
        Mar.show();
        } else {
        luty.addClass("active");
        Lut.show();
    }}
    if(month == 4) {
        if (day>15) {
        kwiecien.addClass("active");
        Kwi.show();
        } else {
        marzec.addClass("active");
        Mar.show();
    }}


    if(month == 5) {
        if (day>15) {
        maj.addClass("active");
        Maj.show();
        } else {
        kwiecien.addClass("active");
        Kwi.show();
    }}
    if(month == 6) {
        if (day>15) {
        czerwiec.addClass("active");
        Cze.show();
        } else {
        maj.addClass("active");
        Maj.show();
    }}

    if(month == 7) {
        if (day>15) {
        lipiec.addClass("active");
        Lip.show();
        } else {
        czerwiec.addClass("active");
        Cze.show();
    }}
    if(month == 8) {
        if (day>15) {
        sierpien.addClass("active");
        Sie.show();
        } else {
        lipiec.addClass("active");
        Lip.show();
    }}

    if(month == 9) {
        if (day>15) {
        wrzesien.addClass("active");
        Wrz.show();
        } else {
        sierpien.addClass("active");
        Sie.show();
    }}
    if(month == 10) {
        if (day>15) {
        pazdziernik.addClass("active");
        Paz.show();
        } else {
        wrzesien.addClass("active");
        Wrz.show();
    }}
    if(month == 11) {
        if (day>15) {
        listopad.addClass("active");
        Lis.show();
        } else {
        pazdziernik.addClass("active");
        Paz.show();
    }}
    if(month == 12) {
        if (day>15) {
        grudzien.addClass("active");
        Gru.show();
        } else {
        listopad.addClass("active");
        Lis.show();
    }}

});
})(jQuery);