Object.prototype.controlInterface = Object.prototype.controlInterface || function (ıntf, obj) {
  if (!ıntf) return false;
  if (!obj) return false;
  let errorItem = 0;
  let errorItemType = 0;

  if (typeof obj === "object" && typeof ıntf === "object") {
    if (Object.keys(obj).length !== Object.keys(ıntf).length) {
      return false;
    }
    Object.keys(ıntf).forEach((item, index) => {
      item !== Object.keys(obj)[index] ? errorItem++ : null;
    });

    Object.values(ıntf).forEach((item, index) => {
      if (typeof item === "object") {
        !Object.controlInterface(item, Object.values(obj)[index]) ? errorItemType++ : null;
      }
      //typeof item !== typeof Object.values(obj)[index] ? errorItemType++ : null;
    });

    if (errorItem !== 0 || errorItemType !== 0) {
      return false;
    }

    return true;
  } else {
    console.error("Object türünde bir değer girin");
    return false;
  }
}

