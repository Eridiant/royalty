window.addEventListener('load', () => {
    // document.forms.callBack.addEventListener('submit', (e) => {
    //     e.preventDefault();
    //     // console.log($(this).serializeArray());
    //     console.log(e.name);
    //     // console.log(this);
        
    // })


    if (document.querySelector('.apartments-thumbs')) {
        var thumbs = new Swiper(".apartments-thumbs", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
        });
        var apartments = new Swiper(".apartments-slider", {
            loop: true,
            spaceBetween: 20,
            thumbs: {
                swiper: thumbs,
            },
            navigation: {
                nextEl: ".apartments-slider-next",
                prevEl: ".apartments-slider-prev",
            },
        });

        let tabs = document.querySelector('.apartments-tabs');
        tabs.addEventListener('click', (e) => {
            let target = e.target.closest('li');
            // console.log(target.classList.contains('active'));
            if (!target.classList.contains('active')) {
                document.querySelector('.apartments-tabs .active').classList.remove('active');
                document.querySelector('.apartments-desc .current').classList.remove('current');
                let i = target.dataset.num;
                document.querySelector(`.apartments-tabs [data-num="${i}"]`).classList.add('active');
                document.querySelector(`.apartments-desc [data-num="${i}"]`).classList.add('current');
                apartments.slideTo(`${i * 2 + 1}`);
            }
        })
    }

    if (document.querySelector('#building-change')) {

        let change = document.querySelector('#building-change');
        let min = Number(change.dataset.min);
        let max = Number(change.dataset.max);
        var floorNum = Number(min);
        floorNum = Number(floorNum);

        document.addEventListener('click', (e) => {
            let target = e.target;
            let nums = document.querySelectorAll('.floor-changes');
            if (target.closest('.prev') && floorNum < max) {
                ++floorNum;
                nums.forEach(el => el.innerHTML = floorNum);
                let data = { 'floor':floorNum };
                floorAjax(data)
                    .then (response => {
                        fl(JSON.parse(response).data.model);
                    });
                floorSelected(floorNum);
            }
            if (target.closest('.next') && floorNum > min) {
                --floorNum;
                nums.forEach(el => el.innerHTML = floorNum);
                let data = { 'floor':floorNum };
                floorAjax(data)
                    .then (response => {
                        fl(JSON.parse(response).data.model);
                    });
                floorSelected(floorNum);
            }
            if (target.closest('.btn')) {
                let data = { 'floor':floorNum };
                floorAjax(data)
                    .then (response => {
                        document.querySelector('#plans').innerHTML = JSON.parse(response).data.rend;
                        if ( document.querySelector('.floor') ) {
                            document.querySelector('.plans-bg').classList.add('dn');
                            document.querySelector('.building').classList.add('dn');
                            flr(JSON.parse(response).data.model);
                        }
                    });
            }
        });

        
    }

    document.addEventListener('click', (e) => {
        if (e.target.closest('.act-btn')) {
            e.preventDefault();
            let act = e.target.closest('.act-btn').dataset.btn;
            document.querySelector(`.${act}`).classList.add('show');
        }

        if (e.target.classList.contains('show')) {
            // document.querySelector('.show').classList.remove('show');
            document.querySelectorAll('.show').forEach((e) => {
                e.classList.remove('show');
            })
        }
    })
    if (document.querySelector('.contacts')) {
        document.forms.callBack.onsubmit = function(e) {
            e.preventDefault();
            callBackAjax(this.name.value, this.phone.value)
                .then(response => document.querySelector('.popup-success').classList.add('show'))
                .catch(error => console.error('error'));
        }
    }

    if (document.querySelector('.popup-wrapper') && false) {
		document.body.addEventListener('click', (e) => {
			if (e.target.classList.contains('popup-wrapper')) {
				document.querySelectorAll('.popup-wrapper').forEach((e) => {
					e.classList.remove('show');
                    document.querySelector('.popup-inner').innerHTML = '';
				})
			}
		})
	}

    if (document.querySelector('.plans')) {

        let building = document.querySelector('#building').contentDocument;

        building.addEventListener('mouseover', (e) => {

            if (e.target.closest('.area')) {
                // console.log(e.target.dataset.i);
                document.querySelector('.fl').innerHTML = e.target.dataset.i;
            }
        })

        building.addEventListener('click', (e) => {
            if (e.target.closest('.area')) {
                floorNum = e.target.dataset.i;
                let data = { 'floor':floorNum }
                floorAjax(data)
                    .then (response => {
                        // console.log(JSON.parse(response).data.model);
                        document.querySelector('#plans').innerHTML = JSON.parse(response).data.rend;
                        if ( document.querySelector('.floor') ) {
                            document.querySelector('.plans-bg').classList.add('dn');
                            document.querySelector('.building').classList.add('dn');
                            flr(JSON.parse(response).data.model);
                        }
                    })
                floorSelected(floorNum);
            }
        })
    }

})

function floorSelected(floorNum) {
    let buildCont = document.querySelector('#building').contentDocument;
    // console.log(buildCont);
    // console.log(buildCont.querySelector('.selected'));
    
    if (buildCont.querySelector('.selected')) {
        buildCont.querySelector('.selected').classList.remove('selected');
    }
    buildCont.querySelector(`[data-i="${floorNum}"]`).classList.add('selected');
}

function floorAjax(data) {
    return new Promise((succeed, fail) => {
        // console.log(wrap.dataset.id);
        let quizRequest = new XMLHttpRequest();
        quizRequest.open("POST", '/site/floor', true);
        quizRequest.setRequestHeader('Content-Type', 'application/json');
        // quizRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        quizRequest.setRequestHeader('X-CSRF-Token', yii.getCsrfToken());
        quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        quizRequest.onload = function() {
            if(quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
                // rend(JSON.parse(quizRequest.responseText));
                // rend(quizRequest.responseText);
                // let ss = JSON.parse(quizRequest.responseText);
                // if (ss.data.success) {
                    // console.log(quizRequest.responseText);
                    // console.log(ss.data.success);
                    succeed(quizRequest.responseText);
                    

            } else if (quizRequest.status == 400) {
                fail(new Error(`Request failed: ${quizRequest.status}`));
            } else {
                fail(new Error('Ошибка, что-то пошло не так.'));
            }
        }
        quizRequest.onerror = function() {console.log(onerror)};
        // let data = { survey_id: quiz.dataset.id };
        // let data = { 'floor':floor };

        // quizRequest.send('survey_id=2&parent_id=0');
        quizRequest.send(JSON.stringify(data));
        // quizRequest.send(encodeURI(data));
        // quizRequest.send(data);
        // quizRequest.send();
    })
}

// function fillData(model, status) {
//     let floor = document.querySelector('#test').contentDocument.querySelectorAll('.area');
    
//     for (let i = 0; i < floor.length; i++) {
//         // const element = array[i];
//         floor[i].dataset.flat = model[i].num;
//     }
// }
function fl(model) {
    if (document.querySelector('#floor')) {
        let floor = document.querySelector('#floor').contentDocument.querySelectorAll('.area');
        for (let i = 0; i < model.length; i++) {
            // console.log(floor.querySelector(`[data-i="${i+1}"]`));
            // console.log(floor.querySelector(`#path-${i+1}`));
            // floor.querySelector(`[data-i="${i+1}"]`).dataset.num = model[i].num;
            // floor.querySelector(`[data-i="${i+1}"]`).dataset.status = model[i].status;
            floor[i].dataset.num = model[i].num;
            floor[i].dataset.status = model[i].status;
            floor[i].dataset.area = model[i].total_area;
            floor[i].dataset.live = model[i].living_space;
            floor[i].dataset.balcony = model[i].balcony_area;
        }
    }
}
function flr(model) {
    // let floor = document.querySelector('#floor').contentDocument;
    let floor = document.querySelector('#floor');
    let flat = document.querySelector('.flat');
    let flatCont = flat.contentDocument;
    document.querySelector('.num').innerHTML = model[1].floor_id;
    console.log(model[1].floor_id);
    floor.addEventListener('load', (e) => {
        let floor = document.querySelector('#floor').contentDocument.querySelectorAll('.area');
        for (let i = 0; i < model.length; i++) {
            // console.log(floor.querySelector(`[data-i="${i+1}"]`));
            // console.log(floor.querySelector(`#path-${i+1}`));
            // floor.querySelector(`[data-i="${i+1}"]`).dataset.num = model[i].num;
            // floor.querySelector(`[data-i="${i+1}"]`).dataset.status = model[i].status;
            floor[i].dataset.num = model[i].num;
            floor[i].dataset.status = model[i].status;
            floor[i].dataset.area = model[i].total_area;
            floor[i].dataset.live = model[i].living_space;
            floor[i].dataset.balcony = model[i].balcony_area;
        }
        document.querySelector('#floor').contentDocument.addEventListener('click', (e) => {
            if (e.target.closest('.area')) {
                let i = e.target.dataset.i;
                flatAjax(i);
                document.querySelector('#flat-num span').innerHTML = floor[i-1].dataset.num;
                document.querySelector('#area span').innerHTML = floor[i-1].dataset.area;
                document.querySelector('#live span').innerHTML = floor[i-1].dataset.live;
                document.querySelector('#balcony span').innerHTML = floor[i-1].dataset.balcony;
                // document.querySelector('.floor-change').innerHTML = e.target.dataset.i;
                flat.classList.add('show');
            }
        })
    })

    

    document.querySelector('.floor-btn').addEventListener('click', (e) => {
        document.querySelector('.plans-bg').classList.remove('dn');
        document.querySelector('.building').classList.remove('dn');
        document.querySelector('#plans').innerHTML = '';
    })

    
    document.querySelector('.flat-btn').addEventListener('click', (e) => {
        flat.classList.remove('show');
    })

    if (document.querySelector('.apartments-thumbs')) {
        function swiper() {
            apartments?.destroy(true, true);
            thumbs?.destroy(true, true);

            var thumbs = new Swiper(".apartments-thumbs", {
                loop: true,
                spaceBetween: 10,
                slidesPerView: 4,
            });
            var apartments = new Swiper(".apartments-slider", {
                loop: true,
                spaceBetween: 20,
                thumbs: {
                    swiper: thumbs,
                },
                navigation: {
                    nextEl: ".apartments-slider-next",
                    prevEl: ".apartments-slider-prev",
                },
            });
        }

        swiper();

        function flatAjax(i) {
            // console.log(wrap.dataset.id);
            let quizRequest = new XMLHttpRequest();
            quizRequest.open("POST", '/site/flat', true);
            quizRequest.setRequestHeader('Content-Type', 'application/json');
            // quizRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            quizRequest.setRequestHeader('X-CSRF-Token', yii.getCsrfToken());
            quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            quizRequest.onload = function() {
                if(quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
                    // rend(JSON.parse(quizRequest.responseText));
                    // rend(quizRequest.responseText);
                    // let ss = JSON.parse(quizRequest.responseText);
                    // sliderFlat(ss.data[0]);
                    
                    // if (ss.data.success) {
                        // console.log(quizRequest.responseText);
                        // console.log(ss.data.success);
                        // document.querySelector('.popup-wrapper').classList.add('show');flat
                        // swiper(false);
                        document.querySelector('.apartments-slider-wrapper').innerHTML = quizRequest.responseText;
                        // document.querySelector('.popup-wrapper .popup-inner').classList.add('sending');
                        // }
                        swiper();
                    flatCurrent(i);
        
                } else if (quizRequest.status == 400) {
                    throw Error('Ошибка: ' + quizRequest.status);
                } else {
                    throw Error('Ошибка, что-то пошло не так.');
                }
            }
            quizRequest.onerror = function() {console.log(onerror)};
            // let data = { survey_id: quiz.dataset.id };
            let data = { 'flat':i };
        
            // quizRequest.send('survey_id=2&parent_id=0');
            quizRequest.send(JSON.stringify(data));
            // quizRequest.send(encodeURI(data));
            // quizRequest.send(data);
            // quizRequest.send();
        }
    }
}

function flatCurrent(i) {
    let flCurr = document.querySelector('#floor-current').contentDocument;
    if (flCurr.querySelector('.select')) {
        flCurr.querySelector('.select').classList.remove('select');
    }
    flCurr.querySelector(`[data-i="${i}"]`).classList.add('select');
}

function callBackAjax(name, phone) {
    return new Promise((succeed, fail) => {
        // console.log(wrap.dataset.id);
        let quizRequest = new XMLHttpRequest();
        quizRequest.open("POST", '/site/callback', true);
        quizRequest.setRequestHeader('Content-Type', 'application/json');
        // quizRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        quizRequest.setRequestHeader('X-CSRF-Token', yii.getCsrfToken());
        quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        quizRequest.onload = function() {
            if(quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
                // rend(JSON.parse(quizRequest.responseText));
                // rend(quizRequest.responseText);
                // let ss = JSON.parse(quizRequest.responseText);
                // if (ss.data.success) {
                    // console.log(quizRequest.responseText);
                    // console.log(ss.data.success);
                    // document.querySelector('.popup-wrapper').classList.add('show');
                    // document.querySelector('.popup-wrapper .popup').innerHTML = quizRequest.responseText;
                    // document.querySelector('.popup-wrapper .popup-inner').classList.add('sending');
                    // }
                    succeed(quizRequest.responseText);

            } else if (quizRequest.status == 400) {
                // throw Error('Ошибка: ' + quizRequest.status);
                fail(new Error(`Request failed: ${quizRequest.status}`));
            } else {
                // throw Error('Ошибка, что-то пошло не так.');
                fail(new Error(`Request failed: ${quizRequest.status}`));
            }
        }
        quizRequest.onerror = function() {console.log(onerror)};
        // let data = { survey_id: quiz.dataset.id };
        let data = { 'name':name, 'phone':phone };

        // quizRequest.send('survey_id=2&parent_id=0');
        quizRequest.send(JSON.stringify(data));
        // quizRequest.send(encodeURI(data));
        // quizRequest.send(data);
        // quizRequest.send();
    })
    
}

function rend(respond) {
    // let wrap = document.querySelector('.quiz-wrap');
    // wrap.innerHTML = respond;
    // console.log(respond);
    
}