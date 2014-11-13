<?php
/**
 *  API para acesso ao banco de dados
 */
define('WCMS_DB_PARSE_LIST', 1);
define('WCMS_DB_PARSE_EQ' , 2);


function wcms_db_insert($table, Array $data) {
	$conn 			= getConnection();

	$keys   		= implode(',', array_keys($data) );

	list($placeholders,$values)   = wcms_db_parse($data, WCMS_DB_PARSE_LIST);

	$stmt = $conn->prepare("INSERT INTO {$table} ({$keys}) VALUES ({$placeholders})");

	wcms_db_prepare($stmt, $values);
		
	if ( $stmt->execute() )
		return $conn->lastInsertId();

	return false;
}


function wcms_db_update($table, Array $data, Array $where) {
	$conn  = getConnection();

	list($placeholders, $values) = wcms_db_parse($data, WCMS_DB_PARSE_EQ, ',');
	list($placeholders_where, $values_where) = wcms_db_parse($where, WCMS_DB_PARSE_EQ, ' AND ');

	$sWhere = '';
	if ( ! empty($where) ) {
		$sWhere = " WHERE {$placeholders_where}"; 
	}

	$stmt = $conn->prepare("UPDATE {$table} SET {$placeholders} {$sWhere}");

	wcms_db_prepare($stmt,$values);

	if ( ! empty($where) ) 
		wcms_db_prepare($stmt, $values_where);

	if ( $stmt->execute() ) return true;

	return false;
}

function wcms_db_delete($table, Array $where) {
	$conn = getConnection();

	list($placeholders, $values) = wcms_db_parse($where, WCMS_DB_PARSE_EQ);	

	$sWhere = '';
	if ( ! empty($where) ) 	
		$sWhere = " WHERE " . $placeholders;

	$stmt = $conn->prepare("DELETE FROM {$table} {$sWhere} ");

	if ( ! empty($where) ) 
		wcms_db_prepare($stmt, $values);

	if ( $stmt->execute() )
		return true;
	
	return false;
}

function wcms_db_select($table, Array $columns, Array $where = [] , Array $limit = [], Array $order = [], $result_mode = PDO::FETCH_OBJ ) {
	$conn = getConnection();

	$sColumns  =  implode(',', $columns);

	list($placeholders, $values) = wcms_db_parse($where, WCMS_DB_PARSE_EQ);	

	$sWhere = '';
	if ( ! empty($where) ) 	
		$sWhere = " WHERE " . $placeholders;

	$sLimit = '';
	if ( ! empty($limit) ) 
		$sLimit = 'LIMIT ' . implode(',', $limit);

	$sOrder = '';
	if ( ! empty($order) ) 
		$sOrder =  'ORDER BY ' . $order[0] . ' ' . $order[1];


	$stmt = $conn->prepare("SELECT {$sColumns} FROM {$table} {$sWhere} {$sOrder} {$sLimit}");

	if ( ! empty($where) ) 
		wcms_db_prepare($stmt, $values);



	if ( $stmt->execute() )
		return $stmt->fetchAll($result_mode);
	
	return false;
} 

function wcms_db_parse( Array $data, $parse_mode = WCMS_DB_PARSE_EQ, $sep = ' AND ' ) {
	if ( empty($data) ) return ['',[] ];

	$prefix = '';
	if ( $parse_mode == WCMS_DB_PARSE_LIST) {
		$prefix = 'i_';
		$placeholders 	= array_map( function($key) use ($prefix) { return ":{$prefix}" . $key; }, array_keys($data) );
		$placeholders 	= implode(',', $placeholders);

	} else if ( $parse_mode == WCMS_DB_PARSE_EQ ) {
		$prefix = 'eq_';
		$placeholders   = array_map(
							function( $key ) use ($prefix) {
								return $key . " = " . ":{$prefix}" . $key . "";
							},
							array_keys($data)
		);
		$placeholders   = implode($sep, $placeholders);
	}

	$values = array_map(
		function ( $key, $value ) use ($prefix){
			return ['placeholder' => ":{$prefix}" . $key, 'value' => $value];
		}, 
		array_keys($data), array_values($data) 
	);

	return [$placeholders, $values];
}

function wcms_db_prepare($stmt, Array $values) {

	foreach ($values as  $value) {
		$stmt->bindValue($value['placeholder'], $value['value'], PDO::PARAM_STR);
	}

}