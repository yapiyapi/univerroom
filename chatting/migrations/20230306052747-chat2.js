'use strict';

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up (queryInterface, Sequelize) {
    try{
    queryInterface.createTable("chat", {
      seq: {
        type: Sequelize.INTEGER(10),
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
      },
      ChatRoom_seq: {
        type: Sequelize.INTEGER(10),
        allowNull: false,
      },
      userID: {
        type: Sequelize.STRING(50),
        allowNull: false,
      },
      msg: {
        type: Sequelize.STRING(255),
        allowNull: false,
      },
      add_date: {
        type: Sequelize.DATE(),
        allowNull: false,
      },
    });}catch(e) {console.error(e);}
  },

  async down (queryInterface, Sequelize) {
    try{queryInterface.dropTable("chat");}
    catch(e) {console.error(e);}
  }
};
