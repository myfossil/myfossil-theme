function throttle(d, a, h) {
    a || (a = 250);
    var b, e;
    return function() {
        var f = h || this,
            c = +new Date,
            g = arguments;
        b && c < b + a ? (clearTimeout(e), e = setTimeout(function() {
            b = c;
            d.apply(f, g)
        }, a)) : (b = c, d.apply(f, g))
    }
};