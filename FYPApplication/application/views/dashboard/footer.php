<footer class="main-footer">
    <strong>Copyright &copy; <?=date('Y')?> Solendra.</strong> All rights reserved.
</footer>

<script>
    
    
    $('form').submit(function(){
        // On submit disable its submit button
        $('[type="submit"]', this).attr('disabled', 'disabled');
    });
   
    $(function()
     {
         var url = window.location.href; 

         var active_li = $('a[href="'+url+'"]').parent();
         var treeview_higher_element = $('a[href="'+url+'"]').parent().parent().parent();

         // if treeview found then active both
         if(treeview_higher_element.hasClass("treeview"))
         {
             treeview_higher_element.addClass( "active" );
             active_li.addClass( "active" );
         }
         // if treeview not found then only active current li
         else
         {
             active_li.addClass( "active" );
         }
     });

    
</script>


<script>


$(function()
{
//   alert('loaded'); 
   
   $('.num_only_validation').keydown(function(e)
   {
       
       // if the key is Backspace, Delete, TAB
        //e.keycode===9 is for TAB press
        if((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode === 8 || e.keyCode === 46 || e.keyCode === 9 || e.keyCode == 13 || e.keyCode == 116)
        {
            // hide error message
            var $note = $('.notifyjs-wrapper').children().first();
            $note.trigger('notify-hide');
            
            return true;
        }
        else
        {
            
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                 //display error message 
                 $(this).notify("Please Input Number!!");
             }
             else
             {
                 // hide error message
                 var $note = $('.notifyjs-wrapper').children().first();
                 $note.trigger('notify-hide');
                 return true;
             }
        }
        
        e.preventDefault();
       
   });
   
   $('.string_only_validation').keydown(function(e)
   {
        // if the key is Backspace, Delete, TAB
        //e.keycode===9 is for TAB press
        if((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode === 8 || e.keyCode === 46 || e.keyCode === 9)
        {
            // hide error message
            var $note = $('.notifyjs-wrapper').children().first();
            $note.trigger('notify-hide');
            
            return true;
        }
        else
        {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

            if (regex.test(str)) {
                // hide error message
                var $note = $('.notifyjs-wrapper').children().first();
                $note.trigger('notify-hide');
                return true;
            }

            else
            {
                //display error message 
                $(this).notify("Please Input Alphabet only!!");
                e.preventDefault();
                
            }
        }
        
        e.preventDefault();
       
       
   });
   
   
   $('.num_and_string_only_validation').keydown(function(e)
   {
       // if the key is Backspace, Delete, TAB
        //e.keycode===9 is for TAB press
        if((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode === 8 || e.keyCode === 46 || e.keyCode === 9)
        {
            // hide error message
            var $note = $('.notifyjs-wrapper').children().first();
            $note.trigger('notify-hide');
            
            return true;
        }
        else
        {
            var regex = new RegExp("^[a-zA-Z0-9]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

            if (regex.test(str)) {
                // hide error message
                var $note = $('.notifyjs-wrapper').children().first();
                $note.trigger('notify-hide');
                return true;
            }

            else
            {
                //display error message 
                $(this).notify("Please Input Alphabet and Number only!!");
                e.preventDefault();
                
            }
        }
        
        
        e.preventDefault();
        
   });
   
});

                

</script>