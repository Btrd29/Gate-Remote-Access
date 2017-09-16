<?php
session_start();
$_SESSION['lemonde'];

if ($_POST['1'] == 'l') {
	$_SESSION['lemonde'] = 'l';
} else if ($_POST['2'] == 'e') {
	$_SESSION['lemonde'] = 'le';
} else if ($_POST['3'] == 'm') {
	$_SESSION['lemonde'] = 'lem';
} else if ($_POST['4'] == 'o') {
	$_SESSION['lemonde'] = 'lemo';
} else if ($_POST['5'] == 'n') {
	$_SESSION['lemonde'] = 'lemon';
} else if ($_POST['6'] == 'd') {
	$_SESSION['lemonde'] = 'lemond';
} else if ($_POST['7'] == 'e') {
	$_SESSION['lemonde'] = 'lemonde';
} else if($_POST['1'] == ''&&$_POST['2'] == ''&&$_POST['3'] == ''&&$_POST['4'] == ''&&$_POST['5'] == ''&&$_POST['6'] == ''&&$_POST['7'] == '') {
	$_SESSION['lemonde'] = "";
} else {
	$urlList = array('https://www.youtube.com/watch?v=SMWi7CLoZ2Q','https://www.youtube.com/watch?v=yO7MWuJ7zLA','https://www.youtube.com/watch?v=Xy-tcosHhvo','https://www.youtube.com/watch?v=JtA_WnBP_Co','https://www.youtube.com/watch?v=eXBqf4Gfuo0','https://www.youtube.com/watch?v=8nJr7mduxOo','https://www.youtube.com/watch?v=w0AOGeqOnFY','https://www.youtube.com/watch?v=7-w2rw1HPHI','https://www.youtube.com/watch?v=cbKmm_xAEro','https://www.youtube.com/watch?v=rcMJeTv6P9M','https://www.youtube.com/watch?v=0FSS2S_gN1A','https://www.youtube.com/watch?v=vmd1qMN5Yo0','https://www.youtube.com/watch?v=kM5pKdaou9A','https://www.youtube.com/watch?v=N5HKikr6AOo','https://www.youtube.com/watch?v=O0MQc0h7J74','https://www.youtube.com/watch?v=H-CMQOcs8hc','https://www.youtube.com/watch?v=KLJ-jXJLPcU','https://www.youtube.com/watch?v=dOSGS9ruj4U','https://www.youtube.com/watch?v=j0eil8S2NAg','https://www.youtube.com/watch?v=DcJFdCmN98s','https://www.youtube.com/watch?v=Gttn6S9UDwo','https://www.youtube.com/watch?v=Hm3JodBR-vs','https://www.youtube.com/watch?v=mghhLqu31cQ','https://www.youtube.com/watch?v=ysn_0wIEtyI','https://www.youtube.com/watch?v=PcRyjkYdDxM','https://www.youtube.com/watch?v=uOKqZLpVRUE','https://www.youtube.com/watch?v=5Jq06Ga71TM','https://www.youtube.com/watch?v=5SIQPfeUTtg','https://www.youtube.com/watch?v=_NXrTujMP50','https://www.youtube.com/watch?v=h51Vkle7d4M','https://www.youtube.com/watch?v=cDmSvjlKjS8','https://www.youtube.com/watch?v=8oVfIFrpslI','https://www.youtube.com/watch?v=nsyHUNfZRzQ','https://www.youtube.com/watch?v=PX7zPlQjAr8','https://www.youtube.com/watch?v=vTIIMJ9tUc8','https://www.youtube.com/watch?v=YLO7tCdBVrA','https://www.youtube.com/watch?v=Q5rZ-ew2UxA','https://www.youtube.com/watch?v=DhkDHS5FwKM','https://www.youtube.com/watch?v=S5GZyZ4Ji-c','https://www.youtube.com/watch?v=KCGI9FHoP18','https://www.youtube.com/watch?v=v7ssUivM-eM','https://www.youtube.com/watch?v=XoDY9vFAaG8','https://www.youtube.com/watch?v=1Wytn-_MSBo','https://www.youtube.com/watch?v=H2Cfg3swvbc','https://www.youtube.com/watch?v=eFajTI4lOHM','https://www.youtube.com/watch?v=prrv6_CUyF0','https://www.youtube.com/watch?v=ebqdwQzmSHM','https://www.youtube.com/watch?v=RNTmPaJVhzo','https://www.youtube.com/watch?v=wdYBY3ddghM','https://www.youtube.com/watch?v=zBJU9ndpH1Q','https://www.youtube.com/watch?v=JImcvtJzIK8','https://www.youtube.com/watch?v=ZZ5LpwO-An4','https://www.youtube.com/watch?v=q6EoRBvdVPQ','https://www.youtube.com/watch?v=7faYMDQaik0','https://www.youtube.com/watch?v=1Bix44C1EzY','https://www.youtube.com/watch?v=lg_sd_EpTDs','https://www.youtube.com/watch?v=CIdXPIN3j38','https://www.youtube.com/watch?v=3LEwQn8OnEU','https://www.youtube.com/watch?v=WzucpFgi7Xk','https://www.youtube.com/watch?v=zKa92AeSByo','https://www.youtube.com/watch?v=K8FwMlkoxjI','https://www.youtube.com/watch?v=XYQnkBkwnFE','https://www.youtube.com/watch?v=ZVboVv59fLQ','https://www.youtube.com/watch?v=zTTTyoThFBU','https://www.youtube.com/watch?v=azEvfD4C6ow','https://www.youtube.com/watch?v=xGKowUNYrKA','https://www.youtube.com/watch?v=ZyhrYis509A','https://www.youtube.com/watch?v=dQw4w9WgXcQ','https://www.youtube.com/watch?v=5-sfG8BV8wU','https://www.youtube.com/watch?v=rlYys58hsCU','https://www.youtube.com/watch?v=K5tVbVu9Mkg','https://www.youtube.com/watch?v=X2WH8mHJnhM','https://www.youtube.com/watch?v=pcBvkGFNCYY','https://www.youtube.com/watch?v=bS5P_LAqiVg','https://www.youtube.com/watch?v=SJUhlRoBL8M','https://www.youtube.com/watch?v=YgGzAKP_HuM','https://www.youtube.com/watch?v=JNGH-LYEBMo','https://www.youtube.com/watch?v=VXCaPR0exE8','https://www.youtube.com/watch?v=QwueAaWgrJ4','https://www.youtube.com/watch?v=c2X9Dj3ZYRA','https://www.youtube.com/watch?v=74gTaRy5GWY','https://www.youtube.com/watch?v=wr8Wk7EmD-0','https://www.youtube.com/watch?v=IuysY1BekOE','https://www.youtube.com/watch?v=PD6P3Pq9OYo','https://www.youtube.com/watch?v=liXGKC3kMfM','https://www.youtube.com/watch?v=lXMskKTw3Bc','https://www.youtube.com/watch?v=tVj0ZTS4WF4','https://www.youtube.com/watch?v=eDxa2tmbhSg','https://www.youtube.com/watch?v=o0u4M6vppCI','https://www.youtube.com/watch?v=Z9LlEIDJL08','https://www.youtube.com/watch?v=PwaTwNvkoPo','https://www.youtube.com/watch?v=DOWbvYYzAzQ','https://www.youtube.com/watch?v=t6q5_7fVjEg','https://www.youtube.com/watch?v=Wid7S3ttK9w','https://www.youtube.com/watch?v=qnX7jqNv1KQ','https://www.youtube.com/watch?v=jt4a05TQZwo','https://www.youtube.com/watch?v=6RrpGgaT5kk');
	shuffle($urlList);
	header('Location: '.$urlList[0]);
}


//deuxieme : E
if ($_SESSION['lemonde'] == 'l') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>
	<h1>Mon second vient avant la poule</h1>
	<form method="post">
		<input name="2" type="submit" value="a">
		<input name="2" type="submit" value="z">
		<input name="2" type="submit" value="e">
		<input name="2" type="submit" value="r">
		<input name="2" type="submit" value="t">
		<input name="2" type="submit" value="y">
		<input name="2" type="submit" value="u">
		<input name="2" type="submit" value="i">
		<input name="2" type="submit" value="o">
		<input name="2" type="submit" value="p">
		<br>
		<br>
		<input name="2" type="submit" value="q">
		<input name="2" type="submit" value="s">
		<input name="2" type="submit" value="d">
		<input name="2" type="submit" value="f">
		<input name="2" type="submit" value="g">
		<input name="2" type="submit" value="h">
		<input name="2" type="submit" value="j">
		<input name="2" type="submit" value="k">
		<input name="2" type="submit" value="l">
		<input name="2" type="submit" value="m">
		<br>
		<br>
		<input name="2" type="submit" value="w">
		<input name="2" type="submit" value="x">
		<input name="2" type="submit" value="c">
		<input name="2" type="submit" value="v">
		<input name="2" type="submit" value="b">
		<input name="2" type="submit" value="n">
	</form>
</body>
</html>

<?php
//troisieme : M
} elseif ($_SESSION['lemonde'] == 'le') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>
	<h1>Mon troisième est le verbe favori de Cupidon</h1>
	<form method="post">
		<input name="3" type="submit" value="a">
		<input name="3" type="submit" value="z">
		<input name="3" type="submit" value="e">
		<input name="3" type="submit" value="r">
		<input name="3" type="submit" value="t">
		<input name="3" type="submit" value="y">
		<input name="3" type="submit" value="u">
		<input name="3" type="submit" value="i">
		<input name="3" type="submit" value="o">
		<input name="3" type="submit" value="p">
		<br>
		<br>
		<input name="3" type="submit" value="q">
		<input name="3" type="submit" value="s">
		<input name="3" type="submit" value="d">
		<input name="3" type="submit" value="f">
		<input name="3" type="submit" value="g">
		<input name="3" type="submit" value="h">
		<input name="3" type="submit" value="j">
		<input name="3" type="submit" value="k">
		<input name="3" type="submit" value="l">
		<input name="3" type="submit" value="m">
		<br>
		<br>
		<input name="3" type="submit" value="w">
		<input name="3" type="submit" value="x">
		<input name="3" type="submit" value="c">
		<input name="3" type="submit" value="v">
		<input name="3" type="submit" value="b">
		<input name="3" type="submit" value="n">
	</form>
</body>
</html>

<?php
//quatrieme : O
} elseif ($_SESSION['lemonde'] == 'lem') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>
	<h1>Mon quatrième n'est pas en bas</h1>
	<form method="post">
		<input name="4" type="submit" value="a">
		<input name="4" type="submit" value="z">
		<input name="4" type="submit" value="e">
		<input name="4" type="submit" value="r">
		<input name="4" type="submit" value="t">
		<input name="4" type="submit" value="y">
		<input name="4" type="submit" value="u">
		<input name="4" type="submit" value="i">
		<input name="4" type="submit" value="o">
		<input name="4" type="submit" value="p">
		<br>
		<br>
		<input name="4" type="submit" value="q">
		<input name="4" type="submit" value="s">
		<input name="4" type="submit" value="d">
		<input name="4" type="submit" value="f">
		<input name="4" type="submit" value="g">
		<input name="4" type="submit" value="h">
		<input name="4" type="submit" value="j">
		<input name="4" type="submit" value="k">
		<input name="4" type="submit" value="l">
		<input name="4" type="submit" value="m">
		<br>
		<br>
		<input name="4" type="submit" value="w">
		<input name="4" type="submit" value="x">
		<input name="4" type="submit" value="c">
		<input name="4" type="submit" value="v">
		<input name="4" type="submit" value="b">
		<input name="4" type="submit" value="n">
	</form>
</body>
</html>

<?php
//cinquieme : N
} elseif ($_SESSION['lemonde'] == 'lemo') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>
	<h1>Mon cinquième est l'inverse de mon troisième</h1>
	<form method="post">
		<input name="5" type="submit" value="a">
		<input name="5" type="submit" value="z">
		<input name="5" type="submit" value="e">
		<input name="5" type="submit" value="r">
		<input name="5" type="submit" value="t">
		<input name="5" type="submit" value="y">
		<input name="5" type="submit" value="u">
		<input name="5" type="submit" value="i">
		<input name="5" type="submit" value="o">
		<input name="5" type="submit" value="p">
		<br>
		<br>
		<input name="5" type="submit" value="q">
		<input name="5" type="submit" value="s">
		<input name="5" type="submit" value="d">
		<input name="5" type="submit" value="f">
		<input name="5" type="submit" value="g">
		<input name="5" type="submit" value="h">
		<input name="5" type="submit" value="j">
		<input name="5" type="submit" value="k">
		<input name="5" type="submit" value="l">
		<input name="5" type="submit" value="m">
		<br>
		<br>
		<input name="5" type="submit" value="w">
		<input name="5" type="submit" value="x">
		<input name="5" type="submit" value="c">
		<input name="5" type="submit" value="v">
		<input name="5" type="submit" value="b">
		<input name="5" type="submit" value="n">
	</form>
</body>
</html>

<?php
//sixieme : D
} elseif ($_SESSION['lemonde'] == 'lemon') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>
	<h1>Mon sixième s'utilise pour coudre</h1>
	<form method="post">
		<input name="6" type="submit" value="a">
		<input name="6" type="submit" value="z">
		<input name="6" type="submit" value="e">
		<input name="6" type="submit" value="r">
		<input name="6" type="submit" value="t">
		<input name="6" type="submit" value="y">
		<input name="6" type="submit" value="u">
		<input name="6" type="submit" value="i">
		<input name="6" type="submit" value="o">
		<input name="6" type="submit" value="p">
		<br>
		<br>
		<input name="6" type="submit" value="q">
		<input name="6" type="submit" value="s">
		<input name="6" type="submit" value="d">
		<input name="6" type="submit" value="f">
		<input name="6" type="submit" value="g">
		<input name="6" type="submit" value="h">
		<input name="6" type="submit" value="j">
		<input name="6" type="submit" value="k">
		<input name="6" type="submit" value="l">
		<input name="6" type="submit" value="m">
		<br>
		<br>
		<input name="6" type="submit" value="w">
		<input name="6" type="submit" value="x">
		<input name="6" type="submit" value="c">
		<input name="6" type="submit" value="v">
		<input name="6" type="submit" value="b">
		<input name="6" type="submit" value="n">
	</form>
</body>
</html>

<?php
//septieme : E
} elseif ($_SESSION['lemonde'] == 'lemond') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>
	<h1>Mon septième n'est pas nous</h1>
	<form method="post">
		<input name="7" type="submit" value="a">
		<input name="7" type="submit" value="z">
		<input name="7" type="submit" value="e">
		<input name="7" type="submit" value="r">
		<input name="7" type="submit" value="t">
		<input name="7" type="submit" value="y">
		<input name="7" type="submit" value="u">
		<input name="7" type="submit" value="i">
		<input name="7" type="submit" value="o">
		<input name="7" type="submit" value="p">
		<br>
		<br>
		<input name="7" type="submit" value="q">
		<input name="7" type="submit" value="s">
		<input name="7" type="submit" value="d">
		<input name="7" type="submit" value="f">
		<input name="7" type="submit" value="g">
		<input name="7" type="submit" value="h">
		<input name="7" type="submit" value="j">
		<input name="7" type="submit" value="k">
		<input name="7" type="submit" value="l">
		<input name="7" type="submit" value="m">
		<br>
		<br>
		<input name="7" type="submit" value="w">
		<input name="7" type="submit" value="x">
		<input name="7" type="submit" value="c">
		<input name="7" type="submit" value="v">
		<input name="7" type="submit" value="b">
		<input name="7" type="submit" value="n">
	</form>
</body>
</html>

<?php
//charade reussie 
} elseif ($_SESSION['lemonde'] == 'lemonde') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>	
	<img src="mon_tout.png" style="width:1000px; height:auto ">
</body>
</html>

<?php
//premier : L
} else {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>
	<h1>Mon premier sert à voler</h1>
	<form method="post">
		<input name="1" type="submit" value="a">
		<input name="1" type="submit" value="z">
		<input name="1" type="submit" value="e">
		<input name="1" type="submit" value="r">
		<input name="1" type="submit" value="t">
		<input name="1" type="submit" value="y">
		<input name="1" type="submit" value="u">
		<input name="1" type="submit" value="i">
		<input name="1" type="submit" value="o">
		<input name="1" type="submit" value="p">
		<br>
		<br>
		<input name="1" type="submit" value="q">
		<input name="1" type="submit" value="s">
		<input name="1" type="submit" value="d">
		<input name="1" type="submit" value="f">
		<input name="1" type="submit" value="g">
		<input name="1" type="submit" value="h">
		<input name="1" type="submit" value="j">
		<input name="1" type="submit" value="k">
		<input name="1" type="submit" value="l">
		<input name="1" type="submit" value="m">
		<br>
		<br>
		<input name="1" type="submit" value="w">
		<input name="1" type="submit" value="x">
		<input name="1" type="submit" value="c">
		<input name="1" type="submit" value="v">
		<input name="1" type="submit" value="b">
		<input name="1" type="submit" value="n">
	</form>
</body>
</html>

<?php
}
?>