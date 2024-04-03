var working = false;
$('.login').on('submit', function(e) {
    e.preventDefault();
    if (working) return;
    working = true;
    var $this = $(this),
    $state = $this.find('button > .state');
    $this.addClass('loading');
    $state.html('Autenticando');
    setTimeout(function() {
    $this.addClass('ok');
    $state.html('Bienvendido!');
    setTimeout(function() {
        $state.html('Aceder');
        $this.removeClass('OK Registrado');
        working = false;
    }, 4000);
}, 3000);
});