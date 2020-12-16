<?php

require_once('header.php');

?>

<h1>Добро пожаловать в Каталог</h1>

<div class="goods" id="goods">

</div>


<form id="pageCh" action="catalog.handle.php">
    <input id="pageVal" style="width: 30px;" min="1" type="number" value="1" name="page" placeholder="page">
</form>
<!-- ------------------------------ -->
<script>
    function getList() {
        $.ajax({
            type: "POST",
            url: "catalog_handler.php",
            data: {
                page: $("#pageVal").val()
            },
            success: function(response) {
                let jsonData = JSON.parse(response);
                document.getElementById("goods").innerHTML = "";
                for (let i = 0; i < jsonData.length; ++i) {
                    document.getElementById("goods").innerHTML += "<div class='good' id='" + i + "'><img src='/FurWorks/goods/" + jsonData[i].picture + "' alt='pic'<p>" + jsonData[i].lable + "</p><button class='good-btn'>Подробнее</button></div>";
                }
            }
        })
    }
    $(document).ready(function() {
        $(".pageCh").submit(getList());
        $(".pageCh").on("input", function() {
            $(this).submit();
        })
    });
</script>

<style>
    .goods {
        display: flex;
        flex-flow: wrap row;
        justify-content: space-around;
    }

    .good {
        display: flex;
        flex-flow: nowrap column;
        justify-content: space-between;
        width: 40%;
        height: 400px;
        border: 1px solid #422371;
        border-radius: 20px;
        margin: 20px;
        text-align: center;
        max-width: 300px;
    }


    .goods img {
        border-radius: 20px;
        height: 70%;
    }

    .good-btn {
        border-radius: 0px 0px 20px 20px;
        height: auto;
        padding: 10px;
    }
</style>

<?php

require_once('footer.php');

?>