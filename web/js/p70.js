$(function () {
	// Set up the form listener.
	$("form").submit(function (e) {
		$("#success, #failure").fadeOut();
		$("form input").attr("disabled", "disabled");

		$.ajax({
			complete: function (xhr, textStatus) {
				$("form input").removeAttr("disabled");
			},
			data: { url: $("#url").val() },
			dataType: "json",
			error: function (xhr, textStatus, errorThrown) {
				$("#success").fadeOut();
				$("#failure").fadeIn();
			},
			success: function (data, textStatus, xhr) {
				$("#gopher-gopher").attr("href", data.gopher).text(data.gopher);
				$("#gopher-html").attr("href", data.html).text(data.html);
				$("#http").attr("href", data.http).text(data.http);
				$("#stats-gopher").attr("href", data.gopher + "+").text(data.gopher + "+");
				$("#stats-http").attr("href", data.http + "+").text(data.http + "+");

				$("#success").fadeIn();
				$("#failure").fadeOut();
			},
			type: "POST",
			url: "add/"
		});

		return false;
	});
});

// vim: set cin ai ts=8 sw=8 noet:
