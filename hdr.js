function isHDRCompatible() {
	if (navigator.vendor == "Apple Computer, Inc.") {
		console.log(1);
		return true;
	}
}

if (isHDRCompatible()) {
	console.log("I can show HDR");
}
