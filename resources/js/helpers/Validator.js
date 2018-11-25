export default class Validator {
  static emailIsValid(email) {
    return email.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i);
  }

  static passwordIsValid(password) {
    return value.length >= 8;
  }
}