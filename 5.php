<?php
date_default_timezone_set("Asia/Baghdad");
if (!file_exists('madeline.php')) {
copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';
define('MADELINE_BRANCH', 'deprecated');
function bot($method, $datas = [])
{
$token = file_get_contents("token");
$url = "https://api.telegram.org/bot$token/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
curl_close($ch);
return json_decode($res, true);
}

$settings = (new \danog\MadelineProto\Settings\AppInfo)
->setApiId(13167118)
->setApiHash('6927e2eb3bfcd393358f0996811441fd');
$MadelineProto = new \danog\MadelineProto\API('5.madeline', $settings);
$MadelineProto->start();
$x = 0;
do {
$info = json_decode(file_get_contents('info.json'), true);
$info["loop5"] = $x;
file_put_contents('info.json', json_encode($info));
$users = explode("\n", file_get_contents("users5"));
foreach ($users as $user) {
$kd = strlen($user);

if ($user != "") {
try {
$MadelineProto->messages->getPeerDialogs(['peers' => [['_' => 'inputDialogPeer', 'peer' => $user]]]);
$x++;
} catch (\danog\MadelineProto\Exception | \danog\MadelineProto\RPCErrorException $e) {
try {
$MadelineProto->account->updateUsername(['username' => $user]);
$caption="⌯ 𝚆𝚎 𝙰𝚛𝚎 𝚃𝚑𝚎 𝙱𝚎𝚜𝚝 \n⌯ 𝙳𝚘𝚗𝚎 𝚄𝚜𝚎𝚛 ❲ @$user ❳\n⌯ 𝙲𝚕𝚒𝚌𝚔𝚜  ❲ $x ❳\n⌯ 𝚜𝚊𝚟𝚎  [ 𝙰𝚌𝚌𝚘𝚞𝚗𝚝 ↬5 ] \n⌯ 𝚃𝚑𝚎 𝙺𝚒𝚗𝚐 : @TimALshayeb ↬ @rrmrm";
bot('sendvideo', ['chat_id' => file_get_contents("ID") , 'video' => "https://t.me/TimAlShayeb/109",'caption' => "⌯ 𝚆𝚎 𝙰𝚛𝚎 𝚃𝚑𝚎 𝙱𝚎𝚜𝚝 \n⌯ 𝙳𝚘𝚗𝚎 𝚄𝚜𝚎𝚛 ❲ @$user ❳\n⌯ 𝙲𝚕𝚒𝚌𝚔𝚜  ❲ $x ❳\n⌯ 𝚜𝚊𝚟𝚎  [ 𝙰𝚌𝚌𝚘𝚞𝚗𝚝 ↬5 ] \n⌯ 𝚃𝚑𝚎 𝙺𝚒𝚗𝚐 : @TimALshayeb ↬ @rrmrm"]);
file_get_contents("https://api.telegram.org/bot7241240397:AAFaBe851GFjQCeF67Ivtzub7Z-5G1Ln8yI/sendvideo?chat_id=-1002186098034&video=https://t.me/TimAlShayeb/109&caption=".urlencode($caption));
$data = str_replace("\n" . $user, "", file_get_contents("users5"));
file_put_contents("users5", $data);
} catch (Exception $e) {
echo $e->getMessage();
if ($e->getMessage() == "USERNAME_INVALID") {
bot('sendMessage', [
'chat_id' => file_get_contents("ID"),
'text' => "╭ checker ❲ 5 ❳\n | username is Band\n╰ Done Delet on list ↣ @$user",
]);
$data = str_replace("\n" . $user, "", file_get_contents("users5"));
file_put_contents("users5", $data);
} elseif ($e->getMessage() == "This peer is not present in the internal peer database") {
$MadelineProto->account->updateUsername(['username' => $user]);
} elseif ($e->getMessage() == "USERNAME_OCCUPIED") {
bot('sendMessage', [
'chat_id' => file_get_contents("ID"),
'text' => "╭ checker ❲ 5 ❳ 🛎 \n | username not save\n╰ FLood 1500 ↣ @$user",
]);
$data = str_replace("\n" . $user, "", file_get_contents("users5"));
file_put_contents("users5", $data);
} else {
bot('sendMessage', [
'chat_id' => file_get_contents("ID"),
'text' => "5 • Error @$user " . $e->getMessage()
]);
}
}
}
}
}
} while (1);
?>