<?php
$tips = array(
    "请在此处输入您想要的TIPS捏，一行一个",
    "Tip 2",
    "Tip 3",
    // 您可以在此处添加更多的Tips捏
);
$act=$_GET['a'];
if($act=='get'){
    exit($tips[array_rand($tips)]);
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
    <title>随机Tips</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</html>
<body>
   <p id="tip-text">点我试试看捏</p>
<script>
const tipText = document.getElementById('tip-text');

tipText.addEventListener('click', () => {
  // 调用PHP文件获取TIP数据
  fetch('?a=get')
    .then(response => response.text())
    .then(data => {
      // 显示打字效果
      let index = 0;
      const intervalId = setInterval(() => {
        tipText.innerHTML = data.slice(0, index);
        index++;
        if (index > data.length) {
          clearInterval(intervalId);
        }
      }, 50);
    });
});

</script>
</body>