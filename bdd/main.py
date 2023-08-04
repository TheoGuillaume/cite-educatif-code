import mysql.connector


def update_auto_increment_last_id():
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="root",
        database="cityeduc_230531"
    )
    cursor = conn.cursor()
    cursor.execute("SHOW TABLES")
    tables = cursor.fetchall()
    for table in tables:
        table_name = table[0]
        # print("SELECT MAX(id) FROM " + table_name)

        max_id = 0
        try:
            cursor.execute("SELECT MAX(id) FROM " + table_name)
            max_id = int(cursor.fetchone()[0])
        except:
            # print("Error for " + table_name)
            print()
        max_id = max_id + 1

        # cursor.execute(f"ALTER TABLE {table_name} AUTO_INCREMENT={max_id+1}")
        print("ALTER TABLE "+table_name +
              " AUTO_INCREMENT=" + str(max_id) + " ;\n")
    conn.close()


def delete_all_data():
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="root",
        database="cityeduc_230531"
    )
    cursor = conn.cursor()
    cursor.execute("SHOW TABLES")
    tables = cursor.fetchall()
    print("SET FOREIGN_KEY_CHECKS=0;")
    for table in tables:
        table_name = table[0]
        # print("delete from "+table_name + " ;\n")
        print("TRUNCATE  "+table_name + " ;\n")
    conn.close()
    print("SET FOREIGN_KEY_CHECKS=1;")


# update_auto_increment_last_id()
delete_all_data()
