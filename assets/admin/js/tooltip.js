/*
* Basic jQuery Tool Tip Plugin
* Author: Patrick Scott
* Github: pkellz
*/

//Different styles
//Animations, eventually
//Width, shortTip? longTip?
//Issues, conflict with text-align:center
//different arrow directions
//particle tooltips? o_O
(function($)
{
  $.fn.tooltip = function(options)
  {
    //custom plugin options
    var tmpSettings = {
      animation:null,
      speed:null,
    }

    $.extend(tmpSettings,options);

    //default tooltip styles
    var settings = {
      backgroundColor:'#333', //static background
      background:null, //linear-gradient background
      display:'block',
      position:'absolute',
      left:0,
      bottom:'110%',
      padding:'10px',
      borderRadius:'5px',
      borderTop:'3px solid #cc2300', //highlight
      color:'#fff',
      lineHeight:'normal',
      textTransform:'none',
      fontFamily:'Open Sans, sans-serif',
      fontSize:'12px',
      transform:function()
      {
        if(tmpSettings.animation)
        {
          if(tmpSettings.animation == 'transY')
            return 'scaleY(0)';
          else if(tmpSettings.animation == 'transX')
            return 'scaleX(0)';
          return 'scaleY(0)';
        }
        else
          return 'scaleY(0)'; //default animation
      },
      transition: function()
      {
        if(tmpSettings.speed)
        {
          if(tmpSettings.speed == 'slow')
            return 'all 1.5s ease';
          else if(tmpSettings.speed == 'fast')
            return 'all 0.25s ease';
          return 'all 0.5s ease';
        }
        else
          return 'all 0.5s ease'; //default animation speed
      },
      textAlign:'center',
      complete: null, //callback
    }

    //arrow styles
    var arrowStyles = {
      borderTop: function() //down arrow
      {
          if(settings.background) //linear-gradient, use bottom color as arrow color
          {
            var bottomGradient = settings.background.split(',')[1].substring(0,settings.background.split(',')[1].length-1);
            return '10px solid ' + bottomGradient;
          }
          if(settings.backgroundColor) //static background
          {
            return '10px solid ' + settings.backgroundColor;
          }
      },
      transition:settings.transition,
    }

    if(options) $.extend(settings, tmpSettings);

    //If this element has a title
    if($(this).attr('title'))
    {
      $(this).addClass('tipElement');

      //store text from title attr and remove title attr to disable default tooltip
      var $toolTipText = $(this).attr('title');
      $(this).removeAttr('title');

      //create the tooltip span with the text pulled from the title attr
      var $toolTipSpan = $('<span/>', {text: $toolTipText});
      //create the arrow span
      var $toolTipArrow = $('<span/>', {class:'arrow arrow-down'}).css(arrowStyles);

      //add the styling to the tooltip
      $toolTipSpan.css(settings);

      if ($toolTipText) $toolTipSpan.appendTo($(this));
      $toolTipSpan.append($toolTipArrow);

      $(this).on('mouseenter',function()
      {
        console.log(settings.transform().split('(')[0]+"(1)");
        $(this).find('span').css({'opacity':'1','transform':settings.transform().split('(')[0]+"(1)"});

      }).on('mouseleave',function()
      {
        console.log(settings.transform().split('(')[0]+"(0)");

        $(this).find('span').css({'opacity':'0','transform':settings.transform().split('(')[0]+"(0)"});
      });
    }

    if($.isFunction(settings.complete))
    {
      settings.complete.call(this);
    }
    return this;
  }
})(jQuery);
