<?php
session_start();
session_unset();
session_destroy();
?>
<script>
    window.onbeforeunload = function() {
      
        $.ajax({
            type: "POST",
            url: "runtrigger.php",
            data: {
                
            }
        });
    };
</script>
<?php
header("location: index.php");
?>