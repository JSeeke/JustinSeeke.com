function scrollToSection(section) {
	var height = $(window).height();
	switch (section) {
		case "aboutMe":
			for (i=0; i<height; i++) {
				window.scrollTo(0, i);
			}
			break;
		case "myStory":
			height *= 2;
			for (i=0; i<height; i++) {
				window.scrollTo(0, i);
				setTimeout(function() {}, 10);
			}
			break;
		case "myProjects":
			height *= 3;
			for (i=0; i<height; i++) {
				window.scrollTo(0, i);
				setTimeout(function() {}, 10);
			}
			break;
	}
}