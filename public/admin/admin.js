
$(document).ready(function () {
   $(".nav-treeview .nav-link, .nav-link").each(function () {
      var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
      var link = this.href;
      if (link == location2) {
         $(this).addClass('active');
         $(this).parent().parent().parent().addClass('menu-is-opening menu-open');

      }
   });

   $('.delete-btn').click(function () {
      var res = confirm('Подтвердите действия');
      if (!res) {
         return false;
      }
   });


   //Инициализация duallistbox для выбора категорий поста 
   //https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox#readme
   $("#bootstrap-duallistbox-nonselected-list_category").bootstrapDualListbox({
      // see next for specifications
      iconMove: 'oi-arrow-thick-righ',
      nonSelectedListLabel: 'Доступные категории',
      selectedListLabel: 'Выбраные категории',
      infoText: false,
      filterPlaceHolder: 'Фильтр',
      showFilterInputs: false,
      iconsPrefix: 'fas',
      iconMove: "fa-angle-double-right",
      iconRemove: "fas fa-angle-double-left",


   });
})