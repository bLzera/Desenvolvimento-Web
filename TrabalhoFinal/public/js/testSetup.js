const setDisId = function (disid, setid) {
    localStorage.setItem('dispositivo_id', disid);
    localStorage.setItem('setor_id', setid);
}

export { setDisId };