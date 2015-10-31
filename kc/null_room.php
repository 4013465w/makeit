<?php
require_once ('../public/config/config.php');
$CookieFile = '/cookie.tmp';
$jxl=8;
$jc=5;
$xq=3;
if(isset($_GET['img'])){
	$url = 'http://202.194.116.31/validateCodeAction.do';
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_COOKIEJAR, $CookieFile);//把返回来的cookie信息保存在文件中
    curl_setopt($ch, CURLOPT_REFERER, "http://202.194.116.31/");//设置请求的来源referrer)
	curl_exec($ch);
	curl_close($ch);
	exit();
}
			if(isset($_POST['md'])){
				$zc=$_POST['zc'];
				$xq=$_POST['xq'];
				$a=$_POST['xh']; //号
				$b=$_POST['md'];//验证码
				//echo $b.'dddddddddddddd';
				$p="zjh=".$a."&mm=".$_POST['mm']."&v_yzm=".$b;
				if($_POST['kl'] != 'make_minikb'){
					exit(0);
				}
				$ch = curl_init();
				// 2. 设置选项，包括URL
				curl_setopt($ch,CURLOPT_URL, "http://202.194.116.31/loginAction.do");
				curl_setopt($ch,CURLOPT_COOKIEFILE, $CookieFile);//同时发送Cookie
				curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch,CURLOPT_POST, 1);
				curl_setopt($ch,CURLOPT_POSTFIELDS, $p);//提交查询信息
				 $s=curl_exec($ch);
				//echo $s;//输出结果
				curl_close($ch);
				$ch = curl_init();
				$url='http://202.194.116.31/xszxcxAction.do?oper=xszxcx_lb';//这是查成绩的页面
				
				//mb_convert_encoding($p, 'utf8', 'GBK2312');
				$ch = curl_init() ;  
				curl_setopt($ch, CURLOPT_URL,$url) ; 
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch,CURLOPT_COOKIEFILE,$CookieFile);
				  curl_exec($ch);
				curl_close($ch);
			///清除数据库
				$sql='DELETE FROM null_class';
				mysqli_query($GLOBALS['DB'], $sql);
				//$myfile = fopen("zc".$zc."filexq".$xq.".sql", "w") or die("Unable to open file!");
				for($jxl=1;$jxl<=8;$jxl++){
					for($jc=1;$jc<=12;$jc++){
						echo "jxl".$jxl."jc".$jc."sl";
							$p="zxxnxq=2015-2016-1-1&zxXaq=01&zxJxl=".$jxl."&zxZc=".$zc."&zxJc=".$jc."&zxxq=".$xq."&pageSize=300&page=1&currentPage=1&pageSize=300";
							$url='http://202.194.116.31/xszxcxAction.do?oper=tjcx';
							$ch = curl_init() ;  
							curl_setopt($ch, CURLOPT_URL,$url) ; 
							curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
							curl_setopt($ch,CURLOPT_COOKIEFILE,$CookieFile);
							curl_setopt($ch,CURLOPT_POST, 0);
							curl_setopt($ch,CURLOPT_POSTFIELDS, $p);//提交查询信息
							$html = curl_exec($ch);
																			
							// echo $p;
							$info = curl_getinfo($ch);
							//var_dump($info);

							curl_close($ch); 										  
							//var_dump($html);
							preg_match_all("/<tr class=\"odd\" onMouseOut=\"this.className='even';\" onMouseOver=\"this.className='evenfocus';\">(.*?)<\/tr>/s",$html,$trs);//�����
							echo $num= count($trs[0]).'<br/>';
							//var_dump($trs[0][0]);
							for($i=0;$i<$num;$i++){
								$str= str_replace(array(" ","\r\n","\t","\n","\r"), "", $trs[0][$i]);	
								$str=mb_convert_encoding($str, 'utf8', 'GB2312');				
								preg_match_all("/<td>(.*?)<\//s",$str,$tds);
								$tds[1][6]='';
								$sql = "INSERT INTO `null_class`(`id`, `jxl`, `zc`, `jc`, `xq`,`js`,`zw`,`times`,`type`) VALUES (NULL,".$jxl.",".$zc.",".$jc.",".$xq.",'".$tds[1][3]."',".$tds[1][5].",".time().",'".$tds[1][4]."');\n";
								$result = mysqli_query($GLOBALS['DB'], $sql);
								//fwrite($myfile, $sql);
								//$ans[$i]=$tds[1];
								//var_dump($tds);
							}
																			
										//var_dump($ans);
									   //$info = curl_getinfo($ch);
										//var_dump($info);
				}
			}
			}else{
?>
<form id="form1" name="form1" method="post" action="null_room.php">

验证码：
  <input type="text" name="md"/>
  <img src="?img=true" />
  <br/>
  周次：
  <input type="text" name="zc"/>
  <br/>
  星期：
  <input type="text" name="xq"/>
  <br/>
  学号：
  <input type="text" name="xh"/>
  <br/>
  密码：
  <input type="text" name="mm"/>
  <br/>
  口令：
  <input type="text" name="kl"/>
  <input type="submit" name="button" id="button" value="提交更新" />
</form>
<?php }?>
