<script>
$(document).ready(function() {
    const colors = ["red", "orange", "yellow", "green", "blue", "indigo", "violet"];
    let index = 0;
    let delay = 1000;

    setInterval(function() {
        $(".highlight").css("color", colors[index]);
        index = (index + 1) % colors.length;
    }, delay);
});
</script>