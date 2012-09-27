/**
* 指定したフォーム以下のsubmit, buttonをdisabledにします。
* ※disabledのinput要素はサーバに送信されません。送信の必要があればsetHiddenValueなどを利用してください。
* 例）
* <form onsubmit="disableSubmit(this)" method="post" action="/index.php">
*
* @param form submitとbuttonをdisabledとするformオブジェクト
*
*/
function disableSubmit(form) {
    var elements = form.elements;
    for (var i = 0; i < elements.length; i++) {
       if (elements[i].type == 'submit' || elements[i].type == 'button') {
           elements[i].disabled = true;
       }
    }
}

/**
* nameとvalue属性をコピーしたhidden要素を作成します。
* ※2度押し対応などでbuttonやsubmitをdisableにした場合、サーバに送信されません。
* 　　name,valueが同様のhidden要素を作成することでサーバへの送信を実現します。
* 例）
* <input type="submit" name="regist" value="登録" onclick="setHiddenValue(this)">
*
* @param button コピー元のbuttonオブジェクト
*/
function setHiddenValue(button) {
    if (button.name) {
       var q = document.createElement('input');
       q.type = 'hidden';
       q.name = button.name;
       q.value = button.value;
       button.form.appendChild(q);
    }
}

