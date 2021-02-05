// Dismiss function
$("[data-dismiss]").each(function() {
	var me = $(this),
			target = me.data('dismiss');

	me.on("click", function(e) {
		$(target).fadeOut(function() {
			$(target).remove();
		});
		return false;
	});
});