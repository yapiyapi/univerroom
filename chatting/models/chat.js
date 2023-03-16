module.exports = (sequelize, Datatypes) => {
    const chat = sequelize.define('chat', {
        seq: {
            type: Datatypes.INTEGER(10),
            allowNull: false,
            autoIncrement: true,
            primaryKey: true,
        },
        ChatRoom_seq: {
            type: Datatypes.INTEGER(10),
            allowNull: false,
        },
        userID: {
            type: Datatypes.STRING(50),
            allowNull: false,
        },
        msg: {
            type: Datatypes.STRING(255),
            allowNull: false,
        },
        add_date: {
            type: Datatypes.DATE(),
            allowNull: false,
        },
    }, {
        timestamps: false,
    });
    return chat;
};