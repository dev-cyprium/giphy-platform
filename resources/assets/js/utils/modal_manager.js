class ModalManager {
  constructor() {
    this.activeModal = null;
    this.activeData = null;
  }

  openModal(modal, args = null) {
    this.activeModal = modal;
    this.activeData = args;
  }  

  getData() {
    return this.activeData;
  }

  isModalActive(name) {
    return this.activeModal === name;
  }

  getActiveModal() {
    return this.activeModal;
  }

  close() {
    this.activeData  = null;
    this.activeModal = null;
  }
}

export default new ModalManager();