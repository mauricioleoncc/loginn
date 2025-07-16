<?php
header('Content-Type: application/json');

// Reemplaza con tu App Secret real
$app_secret = "f09011a8f0d37f7c6b59f456d3361b33";

// Recibe el POST firmado desde Facebook
$signed_request = $_POST['signed_request'];
$data = parse_signed_request($signed_request, $app_secret);

// Este es el ID del usuario que quiere eliminar su información
$user_id = $data['user_id'];

// Simula la eliminación de datos (aquí puedes borrar al usuario de tu base de datos)

// Información para devolver
$confirmation_code = uniqid('del_'); // Código de eliminación único
$status_url = 'http://localhost/login/estado_eliminacion.php?code=' . $confirmation_code;

echo json_encode([
    'url' => $status_url,
    'confirmation_code' => $confirmation_code
]);

// Función para analizar la solicitud firmada
function parse_signed_request($signed_request, $secret) {
    list($encoded_sig, $payload) = explode('.', $signed_request, 2);

    $sig = base64_url_decode($encoded_sig);
    $data = json_decode(base64_url_decode($payload), true);

    // Validar firma
    $expected_sig = hash_hmac('sha256', $payload, $secret, true);
    if ($sig !== $expected_sig) {
        error_log('Firma inválida');
        return null;
    }

    return $data;
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
}
