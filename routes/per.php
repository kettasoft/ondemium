Route::get('{path}', AppController::class)->where('path', '^(?!api*).*$');

// {"account":[],"education":{"update":true},"group":{"create":true,"delete":true,"update":true,"activities":true},"clinic":{"create":true,"update":true,"delete":true},"post":{"create":true,"update":true,"delete":true,"comment":true},"activities":{"follow":true,"like":true}}