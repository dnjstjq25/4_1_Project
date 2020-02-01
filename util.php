<?php
// XSS 대응을 위한 HTML 이스케이프
function es($data, $charset='UTF-8'){
  // $data가 배열일 때
  if (is_array($data)){
    // 재귀호출
    return array_map(__METHOD__, $data);
  } else {
    // HTML 이스케이프를 한다
    return htmlspecialchars($data, ENT_QUOTES, $charset);
  }
}

// 배열 문자의 인코드 검사를 한다
function cken(array $data){
  $result = true;
  foreach ($data as $key => $value) {
    if (is_array($value)){
      // 포함되어 있는 값이 배열일 때 문자열일 때 문자열에 연결한다
      $value = implode("", $value);
    }
    if (!mb_check_encoding($value, "UTF-8")){
      // 문자 인코드가 일치하지 않을 때
      $result = false;
      // foreach 문의 조사를 중단한다
      break;
    }
  }
  return $result;
}
// ?>
