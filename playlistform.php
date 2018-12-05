<style>
    #addanother, .delete{
        color: blue;
        text-decoration: blue;
    }
    input{
        width: 300px;
    }
    body{
        text-align: center;
    }

    h1{
        margin:auto;

    }
    .bar{
        margin:auto;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $("#addanother").on("click", function(){
            $("#inputgroup").append("<input type='url' name='url[]' placeholder=\"https://www.youtube.com/watch?v=0tmKy2awfxE\"  " +
                "pattern=\"https?:\\/\\/www\\.youtube\\.com\\/watch\\?v.*\" title=\"Valid link required. \" required> " +
            "<span class='delete'> | Delete</span><br>");
        });

        $("#inputgroup").on("click",".delete", function(){
            $(this).prev().remove();
            $(this).next().remove();
            $(this).remove();
        });


    });
</script>

<h1>Create a playlist</h1>
<form action="addingplaylist.php">
    Title <input type="text" name="title" required> <br>
    Theme (optional) <input type="text" name="theme"> <br>
    <h2>Add Songs</h2>
    <hr>
    <p>Input links from Youtube and SoundCloud you'd like in your playlist. <br>
    <strong>NOTE </strong>You must have at least 5 songs to create a playlist. </p>
    <div id="inputgroup">
        <input type="url" name="url[]" placeholder="https://www.youtube.com/watch?v=0tmKy2awfxE"  pattern="https?:\/\/www\.youtube\.com\/watch\?v.*" title="Valid link required" required> <br>
        <input type="url" name="url[]" placeholder="https://www.youtube.com/watch?v=0tmKy2awfxE"  pattern="https?:\/\/www\.youtube\.com\/watch\?v.*" title="Valid link required" required> <br>
        <input type="url" name="url[]" placeholder="https://www.youtube.com/watch?v=0tmKy2awfxE"  pattern="https?:\/\/www\.youtube\.com\/watch\?v.*" title="Valid link required" required> <br>
        <input type="url" name="url[]" placeholder="https://www.youtube.com/watch?v=0tmKy2awfxE"  pattern="https?:\/\/www\.youtube\.com\/watch\?v.*" title="Valid link required" required> <br>
        <input type="url" name="url[]" placeholder="https://www.youtube.com/watch?v=0tmKy2awfxE"  pattern="https?:\/\/www\.youtube\.com\/watch\?v.*" title="Valid link required" required> <br>
    </div><br>
    <input type="hidden" name="creating" value="true">
    <strong><span id="addanother" >Add another input</span><br></strong>
    <input type="submit" value="Create playlist">

</form>
