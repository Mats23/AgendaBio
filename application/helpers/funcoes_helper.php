<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function limpar($string){
	$table = array(
        '/'=>'', '('=>'', ')'=>'',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
	$string= preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8','ASCII//TRANSLIT',$string));
	$string= strtolower($string);
	$string= str_replace("-", "", $string);
	$string= str_replace("---", "", $string);
	$string= str_replace(" ", "", $string);
	return $string;
}
function gerar_id($id){
$chars = str_split( substr( $id, 0, 4 ) );
$nums  = ( int ) substr( $id, 4 );
if( ( $nums + 1 ) > 9999 )
{
	for( $i = 3, $j = 2 ; $i >= 0; $i--, $j-- )
	{
		$char = ord( $chars[ $i ] ) + ( ( $i == 3 ) ? 1 : 0 );
		if( $char > 90 )
		{
			if( $i > 0 )
			{
				$chars[ $j ] = chr( ord( $chars[ $j ] ) + 1 );
				$chars[ $i ] = chr( 65 );
			}
		}
		else
		{
			$chars[ $i ] = chr( $char );
		}
	}
	return sprintf( '%s0000', implode( null, $chars ) );
}
else
{
	return sprintf( '%s%04s', implode( null, $chars ), $nums + 1 );
}
}
