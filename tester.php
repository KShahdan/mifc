
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>


  <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

  <table border='1'>
    <tr><td class='item-id'>1</td><td>Olivia</td><td>someemail@mail.com</td></tr>
  </table>
</br>
<table border='1'>
  <tr><td class='item-id'>2</td><td>Thebaldi</td><td>someemail2@mail.com</td></tr>
</table>
</br>
<table border='1'>
  <tr><td class='item-id'>3</td><td>Garcia</td><td>someemail3@mail.com</td></tr>
</table>
</br><div id='show_responce'>I am a text on page del2.php and I am pretty much useless apart from showing you where the responce will display</div>
</body>
<script type="text/javascript">
  $("tr").click(function() {

   var rep = $("#show_responce");

   var id = $(this).find('.item-id').text();

   var dataString = 'id=' + id;
   $.ajax({
     type: 'post',
     url: 'tester.php',
     data: dataString,
     success: function(html) {
       rep.empty().append(html);
       // rep.fadeIn("slow")
     }
   });    

 });

</script>
</html>