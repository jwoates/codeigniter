// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function f(){ log.history = log.history || []; log.history.push(arguments); if(this.console) { var args = arguments, newarr; args.callee = args.callee.caller; newarr = [].slice.call(args); if (typeof console.log === 'object') log.apply.call(console.log, console, newarr); else console.log.apply(console, newarr);}};

// make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());


// place any jQuery/helper plugins in here, instead of separate, slower script files.



$(function(){

 // $('#videolist a').live('click', function(e) {
 //    var click, data;
 //    e.preventDefault();
 //    click = $(this);
 //    data = click.data('yt-id');
 //    log(data);

 //    $('#videolist a').removeClass('active');

 //  });

  $('#videolist a:first-child').addClass('active');

 $('#videolist a').live('click', function(e) {
    var click, data;
    e.preventDefault();
    click = $(this);
    data = click.data('yt-id');
    log(data);
    $('#video-wrap').html('<iframe frameborder="0" allowfullscreen="" id="yt-video-player" class="yt" title="YouTube video player" height="308" width="533" src="https://www.youtube.com/embed/'+ data +'?wmode=transparent&amp;rel=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fe3-2012.herokuapp.com"></iframe>');

    $('#videolist a').removeClass('active');
    $(click).addClass('active');

  });
  

 


});

