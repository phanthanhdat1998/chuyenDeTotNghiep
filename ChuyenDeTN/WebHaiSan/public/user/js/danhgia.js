    let dem = 1;

    function danhGia() {
        if (dem % 2 === 0) {
            $('.input').addClass('hide');
            dem++;
        } else {
            $('.input').removeClass('hide');
            dem++;
        }
    }

    function content(x) {
        if (x === 1) {
            document.getElementById('evaluate').value = "1";
            $('#content').removeClass('hide');
            document.getElementById('content').innerHTML = "Không thích";
            $('#i2').addClass('color-star');
            $('#i3').addClass('color-star');
            $('#i4').addClass('color-star');
            $('#i5').addClass('color-star');
        } else if (x === 2) {
            document.getElementById('evaluate').value = "2";
            $('#content').removeClass('hide');
            document.getElementById('content').innerHTML = "Tạm được";
            $('#i2').removeClass('color-star');
            $('#i3').addClass('color-star');
            $('#i4').addClass('color-star');
            $('#i5').addClass('color-star');
        } else if (x === 3) {
            document.getElementById('evaluate').value = "3";
            $('#content').removeClass('hide');
            document.getElementById('content').innerHTML = "Bình thường";
            $('#i2').removeClass('color-star');
            $('#i3').removeClass('color-star');
            $('#i4').addClass('color-star');
            $('#i5').addClass('color-star');
        } else if (x === 4) {
            document.getElementById('evaluate').value = "4";
            $('#content').removeClass('hide');
            document.getElementById('content').innerHTML = "Rất tốt";
            $('#i2').removeClass('color-star');
            $('#i3').removeClass('color-star');
            $('#i4').removeClass('color-star');
            $('#i5').addClass('color-star');
        } else {
            document.getElementById('evaluate').value = "5";
            $('#content').removeClass('hide');
            $('#i2').removeClass('color-star');
            $('#i3').removeClass('color-star');
            $('#i4').removeClass('color-star');
            $('#i5').removeClass('color-star');
            document.getElementById('content').innerHTML = "Tuyệt vời";
        }
    }