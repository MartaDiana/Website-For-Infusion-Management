// event pada saat link di klink

// $('.page-scroll').on('click', function(e){

//     // ambil isi href
//     var tujuan = $(this).attr('href');

//     // tangkap elemen yang bersagkutan
//     var elemenTujuan = $(tujuan);
    
//     // pindahkan scroll

//     console.log($('body').scrollTop());

//     e.preventDefault();

// });

$('.page-scroll').on('click', function(e) {

    var tujuan = $(this).attr('href');
   
    var elemenTujuan = $(tujuan);
   
    $('html , body').animate({
     scrollTop: elemenTujuan.offset().top - 0
    },1000);
   
    e.preventDefault();
   });