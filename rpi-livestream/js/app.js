app.showLoading = function(el, zoom, strokeWidth){
  if (!(el instanceof jQuery))
    el = $(el);
  if (strokeWidth === undefined)
    strokeWidth = 1.25;
  if (zoom === undefined)
    zoom = 3;
  var loaderSrc = $('#loader-template').html();
  var template = Handlebars.compile(loaderSrc);
  var loaderData = {
    'stroke-width': strokeWidth,
    'zoom': zoom
  };
  var loaderHtml = template(loaderData);
  el.html(el.html() + "<br>" + loaderHtml);
  app.loading = true;
};
app.hideLoading = function(){
  if (app.loading){
    $('.loader').css('display', 'none');
    app.loading = false;
  }
};
